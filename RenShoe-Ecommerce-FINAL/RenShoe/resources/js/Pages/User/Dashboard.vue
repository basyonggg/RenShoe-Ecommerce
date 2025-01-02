<script setup>
import UserLayouts from './Layouts/UserLayouts.vue';

defineProps({
    orders: Array
})
</script>

<template>

    <UserLayouts>
        <body class="bg-gray-100">
    <!-- Dashboard Header -->
    <div class="max-w-7xl mx-auto p-6">
        <h1 class="text-xl font-bold mb-2">Hello, Kevin</h1>
        <p class="text-gray-600">This is your account dashboard. You can easily check & view your <a href="recent-orders.html" class="font-bold text-black hover:underline">Recent Orders</a>, manage your <a href="shipping-addresses.html" class="font-bold text-black hover:underline">Shipping Addresses</a>.</p>

        <div class="grid grid-cols-3 gap-6 mt-6 items-start">
            <!-- Account Info -->
            <div class="bg-white shadow p-6 rounded-lg flex flex-col min-h-[300px]">
                <h2 class="text-base font-semibold text-black uppercase mb-4">Account Info</h2>
                <div class="flex items-center space-x-4">
                    <img src="https://via.placeholder.com/80" alt="Profile Picture" class="w-20 h-20 rounded-full">
                    <div>
                        <h3 class="text-lg font-bold">Kevin Gilbert</h3>
                        <p class="text-sm text-gray-600">Dhaka - 1207, Bangladesh</p>
                    </div>
                </div>
                <div class="mt-8 space-y-1 flex-grow">
                    <p class="text-sm text-gray-600"><span class="font-medium">Email:</span> kevin.gilbert@gmail.com</p>
                    <p class="text-sm text-gray-600"><span class="font-medium">Username:</span> qwert</p>
                </div>
                <button class="w-full px-4 py-2 bg-black text-white text-sm font-medium rounded">Edit Account</button>
            </div>

            <!-- Billing Address -->
            <div class="bg-white shadow p-6 rounded-lg flex flex-col min-h-[300px]">
                <h2 class="text-base font-semibold text-black uppercase mb-8">Billing Address</h2>
                <p class="text-sm text-gray-600 leading-6 flex-grow"><span class="font-semibold">Street Address: </span>Batiller</p>
                <p class="text-sm text-gray-600 leading-6 flex-grow"><span class="font-semibold">City Address: </span>Umapad, Mandaue City 6014</p>
                <div class="space-y-4">
                    <p class="text-sm text-gray-600"><span class="font-semibold">Phone:</span> +1-202-555-0118</p>
                </div>
                <button class="mt-8 w-full px-4 py-2 bg-black text-white text-sm font-medium rounded">Edit Address</button>
            </div>

            <!-- Order Stats -->
            <div class="flex flex-col space-y-4 mt-2">
                <div class="bg-blue-100 p-4 rounded-lg">
                    <h3 class="text-2xl font-bold text-blue-800">154</h3>
                    <p class="text-sm text-gray-600">Total</p>
                </div>
                <div class="bg-yellow-100 p-4 rounded-lg">
                    <h3 class="text-2xl font-bold text-yellow-800">05</h3>
                    <p class="text-sm text-gray-600">Pending</p>
                </div>
                <div class="bg-green-100 p-4 rounded-lg">
                    <h3 class="text-2xl font-bold text-green-800">149</h3>
                    <p class="text-sm text-gray-600">Completed</p>
                </div>
            </div>
        </div>

            <!-- Order History Table -->
            <div class="bg-white shadow mt-4 rounded-lg">
                <div class="bg-white shadow p-4 rounded-t-lg flex justify-between items-center">
                    <h1 class="text-lg font-semibold text-gray-800">Recent Orders</h1>
                    <a href="order_history.html" class="text-black font-bold mr-10 hover:underline">View All</a>
                </div>
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-sm font-semibold text-gray-600 bg-gray-100 border-b">
                            <th class="py-4 px-6 text-left">Order ID</th>
                            <th class="py-4 px-6 text-left">Status</th>
                            <th class="py-4 px-6 text-left">Date</th>
                            <th class="py-4 px-6 text-left">Total</th>
                            <th class="py-4 px-6 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-4 px-6">#96459761</td>
                            <td class="py-4 px-6 text-yellow-500 font-semibold">IN PROGRESS</td>
                            <td class="py-4 px-6">Dec 30, 2019 07:52</td>
                            <td class="py-4 px-6">$80 (5 Products)</td>
                            <td class="py-4 px-6">
                                <a href="#" class="text-black font-medium hover:underline">View Details</a>
                            </td>
                        </tr>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-4 px-6">#71667167</td>
                            <td class="py-4 px-6 text-green-500 font-semibold">COMPLETED</td>
                            <td class="py-4 px-6">Dec 7, 2019 23:26</td>
                            <td class="py-4 px-6">$70 (4 Products)</td>
                            <td class="py-4 px-6">
                                <a href="#" class="text-black font-medium hover:underline">View Details</a>
                            </td>
                        </tr>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-4 px-6">#95214362</td>
                            <td class="py-4 px-6 text-red-500 font-semibold">CANCELED</td>
                            <td class="py-4 px-6">Dec 7, 2019 23:26</td>
                            <td class="py-4 px-6">$2,300 (2 Products)</td>
                            <td class="py-4 px-6">
                                <a href="#" class="text-black font-medium hover:underline">View Details</a>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="py-4 px-6">#71667167</td>
                            <td class="py-4 px-6 text-green-500 font-semibold">COMPLETED</td>
                            <td class="py-4 px-6">Feb 2, 2019 19:28</td>
                            <td class="py-4 px-6">$250 (10 Products)</td>
                            <td class="py-4 px-6">
                                <a href="#" class="text-black font-medium hover:underline">View Details</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</body>
    </UserLayouts>

</template>