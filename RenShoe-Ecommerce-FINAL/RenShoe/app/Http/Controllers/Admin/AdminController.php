<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function index(){
        
        return Inertia::render('Admin/Dashboard');
    }
    public function getTotalStocks()
{
    // Assuming 'quantity' is the column in the 'products' table
    $totalStocks = Product::sum('quantity');
    return response()->json(['totalStocks' => $totalStocks]);
}

}
