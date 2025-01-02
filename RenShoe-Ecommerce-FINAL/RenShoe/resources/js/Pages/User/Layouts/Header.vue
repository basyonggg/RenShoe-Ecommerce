<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const canLogin = usePage().props.canLogin;
const canRegister = usePage().props.canRegister;
const auth = usePage().props.auth;
const cart = computed(() => usePage().props.cart);

//MNI BANNER
import { XMarkIcon } from '@heroicons/vue/20/solid'

</script>

<template>


    <nav class="bg-black dark:bg-gray-800 antialiased">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-8">
                    <Link :href="route('home')" class="flex items-center">
                        <img src="assets/RenshoeLogo.png" alt="R Logo" class="w-16 h-16 mr-4 object-contain" />
                </Link>
                    <ul class="hidden lg:flex items-center justify-start gap-6 md:gap-8 py-3 sm:justify-center">
                        <li>
                            <Link :href="route('home')" title="" class="flex text-sm font-medium hover:text-primary-700 text-white dark:hover:text-primary-500">Home</Link>
                        </li>
                        <li class="shrink-0">
                            <a href="#" title="" class="flex text-sm font-medium hover:text-primary-700 text-white dark:hover:text-primary-500">Notifications
                            </a>
                        </li>
                    </ul>
                </div>

                <div v-if="canLogin" class="flex items-center lg:space-x-2">
                    <form class=" mx-auto">
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" troke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" id="default-search" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required />
                        </div>
                    </form>

                    <!--ADD TO CART-->
                    <Link :href="route('cart.view')" class="relative inline-flex items-center rounded-lg justify-center p-2 hover:bg-gray-700 text-sm font-medium leading-none text-white">
                    <span class="sr-only">Cart</span>
                    <svg class="w-5 h-5 lg:me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
                    </svg>
                    <!-- Red Notification Badge -->
                    <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -right-2 dark:border-gray-900">{{ cart.data.count }}</div>
                    </Link>
                    <!--END ADD TO CART-->

                    <!--PROFILE BUTTON-->
                    <button v-if="auth.user" id="userDropdownButton1" data-dropdown-toggle="userDropdown1" type="button" class="inline-flex items-center rounded-lg justify-center p-2  hover:bg-gray-700 text-sm font-medium leading-none text-white">
                        <svg class="w-5 h-5 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-width="2" d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        <svg class="w-4 h-4  text-white ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
                        </svg>
                    </button>

                    <!--IF IT IS GUEST ACCOUNT-->
                    <div v-else>
                        <Link :href="route('login')" type="button" class="ml-4 text-white bg-black hover:bg-gray-600 border border-white font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none focus:ring-gray-700">Login</Link>
                        <Link :href="('register')" v-if="canRegister" type="button" class="text-gray-900 bg-white hover:bg-gray-400 border border-black font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 focus:outline-none focus:ring-gray-300">Register</Link>
                    </div>

                    <!--LOGGED IN ACCOUNT-->
                    <div v-if="auth.user" class="hidden z-50 my-4 w-56 text-base list-none bg-white divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 rounded-xl" id="userDropdown1">
                        <div class="py-3 px-4">
                            <span class="block text-sm font-semibold text-gray-900 dark:text-white">{{ auth.user.username }}</span>
                            <span class="block text-sm text-gray-900 truncate dark:text-white">{{ auth.user.email }}</span>
                        </div>
                        <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
                            <li>
                                <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Profile</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Account Settings</a>
                            </li>
                            <li>
                                <Link :href="route('logout')" method="post" class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Log Out</Link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</template>