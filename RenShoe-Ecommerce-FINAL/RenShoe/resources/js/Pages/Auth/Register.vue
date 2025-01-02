<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    username: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
        onError: (errors) => {
            console.error("Submission errors:", errors);
        },
    });
};

</script>

<template>
      <!--HEADER SECTION-->
      <nav class="bg-black dark:bg-gray-800 antialiased">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-8">
                    <!-- Logo -->
                    <Link :href="route('home')" class="flex items-center">
                        <img src="assets/RenshoeLogo.png" alt="R Logo" class="w-16 h-16 mr-4 object-contain" />
                    </Link>
                </div>

                <!-- Home Button -->
                <div>
                    <Link :href="route('home')" class="text-sm font-medium text-white hover:text-primary-700 dark:hover:text-primary-500">Home</Link>
                </div>
            </div>
        </div>
    </nav>
    <!--HEADER SECTION END-->
    
    <Head title="Register" />

    <form @submit.prevent="submit">
      <main class="flex flex-col items-center mb-28 mt-20">
        <!-- Welcome Section -->
        <div class="text-center mt-12 mb-8">
          <h1 class="text-3xl font-bold tracking-wide">Welcome to Ren'Shoe</h1>
        </div>

        <!-- Form Section -->
        <div class="space-y-6 w-full max-w-md px-6">
          <!-- Name Input -->
          <div>
            <InputLabel for="username" value="Username" />
            <TextInput id="username" type="text" placeholder="Enter your username" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-black focus:border-gray-500 text-sm" v-model="form.username" autofocus autocomplete="username"/>
            <InputError class="mt-2" :message="form.errors.username" />
          </div>

          <!-- Email Input -->
          <div>
            <InputLabel for="email" value="Email" />
            <TextInput id="email" type="email" placeholder="Enter your email" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-black focus:border-gray-500 text-sm" v-model="form.email" autocomplete="username"/>
            <InputError class="mt-2" :message="form.errors.email" />
          </div>

          <!-- Password Input -->
          <div>
            <InputLabel for="password" value="Password" />
            <TextInput id="password" type="password" placeholder="••••••••" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-black focus:border-gray-500 text-sm" v-model="form.password" autocomplete="new-password" />
            <InputError class="mt-2" :message="form.errors.password" />

            <!-- Password Confirmation Input -->
          <div class="mt-6">
            <InputLabel for="password_confirmation" value="Confirm Password" />
            <TextInput id="password_confirmation" type="password" placeholder="••••••••" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-black focus:border-gray-500 text-sm" v-model="form.password_confirmation" autocomplete="new-password" />
            <InputError class="mt-2" :message="form.errors.password_confirmation" />
          </div>

            <!-- Password Requirements -->
            <div class="text-xs mt-4 text-gray-500 space-y-1">
              <ul class="flex flex-wrap gap-4">
                <li>• Use 8 or more characters</li>
                <li>• One uppercase character</li>
                <li>• One lowercase character</li>
                <li>• One special character</li>
                <li>• One number</li>
              </ul>
            </div>
          </div>
          
          <!-- Checkbox -->
          <div class="flex justify-center text-sm">
            <input type="checkbox" id="email-updates" class="form-checkbox h-4 w-4 text-black border-gray-300 rounded focus:ring-gray-700">
            <label for="email-updates" class="ml-2 text-gray-700">
              I want to receive emails about product updates, events, and marketing promotions.
            </label>
          </div>
          <!-- Terms -->
          <div class="text-xs text-gray-700 justify-center">
            By creating an account, you agree to the 
            <a href="#" class="text-black font-medium hover:underline">Terms of Use</a> and 
            <a href="#" class="text-black font-medium hover:underline">Privacy Policy</a>.
          </div>
          <!-- Create Account Button -->
          <div>
            <PrimaryButton class="w-full bg-black text-white font-bold py-2 px-4 rounded-lg hover:bg-gray-800 transition" :class="{ 'opacity-25': form.processing }" :disabled="form.processing" > Create an Account
</PrimaryButton>
          </div>

          <!-- Log In Link -->
          <p class="text-center text-sm text-gray-700 mt-4">
            Already have an account? 
            <Link :href="route('login')" class="text-black font-bold hover:underline">Log In</Link>
          </p>
        </div>
      </main>
    </form>

    <!--FOOTER-->
    <footer class="bg-black text-white py-8">
        <!-- Container -->
        <div class="container mx-auto px-6 flex flex-wrap justify-between items-start">
            <!-- Left Section -->
            <div class="mb-8">
                <!-- Logo and Name -->
                <div class="flex items-center mb-6">
                    <img src="assets/RenshoeLogo.png" alt="R Logo" class="w-20 h-20 mr-4 object-contain" />
                    <span class="text-white text-xl font-semibold">Ren'Shoe</span>
                </div>
                <!-- Navigation Links -->
                <nav class="flex flex-wrap space-x-6">
                    <a href="#" class="text-white hover:text-gray-400">Collections</a>
                    <a href="#" class="text-white hover:text-gray-400">Help</a>
                    <a href="#" class="text-white hover:text-gray-400">Contact</a>
                    <a href="#" class="text-white hover:text-gray-400">About</a>
                </nav>
                <!-- Social Icons -->
                <div class="flex space-x-4 mt-6">
                    <a href="#" class="text-white hover:text-gray-400 text-xl">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" class="text-white hover:text-gray-400 text-xl">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-white hover:text-gray-400 text-xl">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-white hover:text-gray-400 text-xl">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </div>

            <!-- Right Section -->
            <div>
                <h4 class="text-lg mb-4 mt-6">Get the Latest Drops</h4>
                <p class="text-gray-400 mb-4">Be the first to know about our latest updates, exclusive offers, and more.</p>
                <!-- Email Subscription Form -->
                <form class="flex">
                    <input type="email" placeholder="Enter your email" class="w-96 px-4 py-2 rounded border border-white focus:ring-2 focus:ring-white-600 text-white bg-black placeholder-white"/>
                    <button type="submit" class="bg-white text-black px-4 rounded hover:bg-gray-200 border ml-4">Subscribe</button>
                </form>
            </div>
        </div>

        <!-- Bottom Section -->
        <div class="border-t border-gray-700 mt-4 pt-6 mr-16 ml-16">
            <div class="container mx-auto px-6 flex justify-between items-center">
                <div class="flex space-x-8">
                    <a href="#" class="text-white hover:text-gray-400">English</a>
                    <a href="#" class="text-white hover:text-gray-400">Privacy</a>
                    <a href="#" class="text-white hover:text-gray-400">Legal</a>
                </div>
                <span class="text-gray-400 text-sm">© 2024 Ren‘Shoe. All Rights Reserved.</span>
            </div>
        </div>
    </footer>
</template>