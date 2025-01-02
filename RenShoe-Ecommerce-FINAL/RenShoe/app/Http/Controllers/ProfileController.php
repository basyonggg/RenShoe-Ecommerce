<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\UserAddress;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    //Display the user's profile form.
    public function edit(Request $request): Response
    {
        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }

    //Update the user's profile information.
    public function update(Request $request): RedirectResponse
{
    // Validate inputs directly in the method
    $validated = $request->validate([
        'first_name' => ['required', 'string', 'max:255'],
        'last_name'  => ['required', 'string', 'max:255'],
        'contact_num'=> ['required', 'string', 'max:20'],
        'username'   => ['required', 'string', 'max:255', 'unique:users,username,' . $request->user()->id],
        'email'      => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $request->user()->id],
        'street'     => ['required', 'string', 'max:255'],
        'purok'      => ['nullable', 'string', 'max:255'],
        'barangay'   => ['required', 'string', 'max:255'],
        'city'       => ['required', 'string', 'max:255'],
        'zipcode'    => ['required', 'string', 'max:10'],
    ]);

    // Update the user's profile fields
    $user = $request->user();
    $user->fill([
        'first_name' => $validated['first_name'],
        'last_name'  => $validated['last_name'],
        'contact_num'=> $validated['contact_num'],
        'username'   => $validated['username'],
        'email'      => $validated['email'],
    ]);

    // Check if the email was changed, and unverify if so
    if ($user->isDirty('email')) {
        $user->email_verified_at = null; // Unverify email if changed
    }

    // Save profile changes
    $user->save();

    // Handle address updates
    UserAddress::updateOrCreate(
        ['user_id' => $user->id], // Search criteria
        [
            'street'   => $validated['street'],
            'purok'    => $validated['purok'],
            'barangay' => $validated['barangay'],
            'city'     => $validated['city'],
            'zipcode'  => $validated['zipcode'],
        ]
    );

    // Redirect with a success message
    return Redirect::route('profile.edit')->with('status', 'Profile and address updated successfully!');
}


    /* Another version of the profile update with alternate logic.
    public function updateAlternate(ProfileUpdateRequest $request): RedirectResponse
    {
        // Second instance: Alternative validation rules
        $validated = $request->validate([
            'first_name'        =>      'nullable|string|max:255',
            'last_name'         =>      'nullable|string|max:255',
            'contact_num'       =>      'nullable|string|max:11',
            'username'          =>      'nullable|string|max:255|unique:users,username,' . $request->user()->id,
            'email'             =>      'nullable|email|max:255|unique:users,email,' . $request->user()->id,
        ]);

        // Second instance: Alternative fill (only if provided)
        $request->user()->fill([
            'first_name'        =>      $validated['first_name'] ?? $request->user()->first_name,
            'last_name'         =>      $validated['last_name'] ?? $request->user()->last_name,
            'contact_num'       =>      $validated['contact_num'] ?? $request->user()->contact_num,
            'username'          =>      $validated['username'] ?? $request->user()->username,
            'email'             =>      $validated['email'] ?? $request->user()->email,
        ]);

        // Second instance: Reset email verification status if changed
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // Second instance: Save updated data
        $request->user()->save();

        // Second instance: Return with alternate status message
        return Redirect::route('profile.edit')->with('status', 'Profile successfully updated with alternative logic!');
    }
        */

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /**
     * Another version of the account deletion process.
     */
    public function destroyAlternate(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        // Second instance: Another process for session handling and token regeneration
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Second instance: Different redirect target after deletion
        return Redirect::route('home');
    }

    
}
