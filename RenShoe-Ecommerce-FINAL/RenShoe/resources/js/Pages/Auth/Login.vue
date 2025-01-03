<script setup>
import { useForm } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
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
    
    <main class="flex-grow flex flex-col items-center mb-24 mt-20">
        <!-- Welcome Back Section -->
        <div class="text-center mt-12 mb-8">
            <h1 class="text-3xl font-bold tracking-wide">WELCOME BACK</h1>
            <p class="text-gray-600 mt-2">Welcome back! Please enter your details.</p>
        </div>

        <!-- Form Section -->
        <form @submit.prevent="submit" class="space-y-6 w-full max-w-md px-6">
            <!-- Email Input -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" v-model="form.email" placeholder="Enter your email" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-black focus:border-gray-300 text-sm"/>
            </div>

            <!-- Password Input -->
            <div class="relative">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" v-model="form.password" placeholder="••••••••" require class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-black focus:border-gray-300 text-sm"/>
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex justify-between items-center text-sm">
                <label class="flex items-center">
                    <input type="checkbox" v-model="form.remember" class="form-checkbox h-4 w-4 text-black border-gray-300 rounded focus:ring-gray-700"/>
                    <span class="ml-2 text-gray-700">Remember me</span>
                </label>
                <Link v-if="canResetPassword" :href="route('password.request')" class="text-black font-medium hover:underline">
                    Forgot password?
                </Link>
            </div>

            <!-- Sign In Button -->
            <div>
                <button type="submit" class="w-full bg-black text-white font-bold py-2 px-4 rounded-lg hover:bg-gray-800 transition" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Sign in</button>
            </div>

            <!-- Sign Up Link -->
            <p class="text-center text-sm text-gray-700">
                Don’t have an account?
                <a href="/register" class="text-black font-bold hover:underline">Sign up for free!</a>
            </p>
        </form>
    </main>

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
