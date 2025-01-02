<template>
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