<script setup>
import { computed, reactive } from 'vue';
import { router, usePage } from '@inertiajs/vue3';


import UserLayouts from './Layouts/UserLayouts.vue';

defineProps({
    userAddress: Object
})

const carts = computed(() => usePage().props.cart.data.items)
const products = computed(() => usePage().props.cart.data.products)
const total = computed(() => usePage().props.cart.data.total)
const itemId = (id) => carts.value.findIndex((item) => item.product_id === id);

const form = reactive({
    purok: null,
    barangay: null,
    city: null,
    zipcode: null,
    street: null,
})

const formFilled = computed(()=>{
    return(form.purok !== null &&
    form.barangay !== null &&
    form.city !== null &&
    form.zipcode !== null &&
    form.street !== null)
})

const update = (product, quantity) => router.patch(route('cart.update', product), {
    quantity,
});

const validateNumberInput = (event, product) => {
    const value = event.target.value.replace(/\D/g, ''); // Remove non-numeric characters
    carts.value[itemId(product.id)].quantity = value ? parseInt(value, 10) : 1; // Default to 1 if empty
};



//remove from cart
const remove = (product) => router.delete(route('cart.delete', product));



//confirm order
function submit() {
    router.visit(route('checkout.store'), {
        method: 'post',
        data: {
            carts: usePage().props.cart.data.items,
            products: usePage().props.cart.data.products,
            total: usePage().props.cart.data.total,
            address: form
        }
    })
}



</script>

<template>
    <UserLayouts>

        <section class="text-gray-600 body-font relative">
            <div class="container px-5 py-24 mx-auto flex sm:flex-nowrap flex-wrap">
                <div class="lg:w-2/3 md:w-1/2 rounded-lg sm:mr-10 p-10">

                    <!--LIST OF CART ITEMS-->


                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-16 py-3"><span class="sr-only">Image</span></th>
                                    <th scope="col" class="px-6 py-3">Product</th>
                                    <th scope="col" class="px-6 py-3">Qty</th>
                                    <th scope="col" class="px-6 py-3">Price</th>
                                    <th scope="col" class="px-6 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="product in products" :key="product.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="p-4">
                                        <img v-if="product.product_images.length > 0" :src="`/${product.product_images[0].image}`" class="w-16 md:w-32 max-w-full max-h-full" alt="Apple Watch">
                                        <img v-else src="https://static.vecteezy.com/system/resources/thumbnails/005/720/408/small_2x/crossed-image-icon-picture-not-available-delete-picture-symbol-free-vector.jpg" class="w-16 md:w-32 max-w-full max-h-full" alt="Apple Watch">
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                        {{ product.product_name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <button
                                                @click.prevent="update(product, carts[itemId(product.id)].quantity - 1)"
                                                :disabled="carts[itemId(product.id)].quantity <= 1"
                                                :class="[carts[itemId(product.id)].quantity > 1 ? 'cursor-pointer text-red-600' : 'cursor-not-allowed text-gray-300 dark:text-gray-500', 'inline-flex items-center justify-center p-1 me-3 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700']"
                                                type="button">
                                                <span class="sr-only">Quantity button</span>
                                                <svg class="w-3 h-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                                </svg>
                                            </button>
                                            <div>
                                                <input type="text" id="first_product"
                                                    @input="validateNumberInput($event, product)"
                                                    v-model="carts[itemId(product.id)].quantity" readonly
                                                    class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="1" required />
                                            </div>
                                            <button
                                                @click.prevent="update(product, carts[itemId(product.id)].quantity + 1)"
                                                class="inline-flex items-center justify-center h-6 w-6 p-1 ms-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                                type="button">
                                                <span class="sr-only">Quantity button</span>
                                                <svg class="w-3 h-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                        ${{ product.price }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a @click="remove(product)"
                                            class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                    <!--END OF CART ITEMS-->
                </div>
                <div class="lg:w-1/3 md:w-1/2 bg-white flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0">
                    <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Cart Summary/Total</h2>
                    <p class="leading-relaxed mb-5 text-gray-600">Total : ${{ total }}</p>

                    <div v-if="userAddress">
                        <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Shipping Address</h2>
                        <p class="leading-relaxed mb-5 text-gray-600">{{ userAddress.street }}, {{ userAddress.purok }}, {{ userAddress.barangay }}, {{ userAddress.city}} {{ userAddress.zipcode }}</p>
                        <p class="leading-relaxed mb-5 text-gray-600">Or add new shipping address below</p>

                    </div>

                    <div v-else>
                        <p class="leading-relaxed mb-5 text-gray-600">You need to add Shipping Address to continue!</p>
                    </div>

                    <form @submit.prevent="submit">
                        <div class="relative mb-4">
                            <label for="name" class="leading-7 text-sm text-gray-600">City</label>
                            <input type="text" id="name" name="city" v-model="form.city"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                            <label for="name" class="leading-7 text-sm text-gray-600">Barangay</label>
                            <input type="text" id="barangay" name="barangay" v-model="form.barangay"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                            <label for="name" class="leading-7 text-sm text-gray-600">Purok</label>
                            <input type="text" id="purok" name="purok" v-model="form.purok"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                            <label for="name" class="leading-7 text-sm text-gray-600">Street</label>
                            <input type="text" id="street" name="street" v-model="form.street"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                            <label for="name" class="leading-7 text-sm text-gray-600">Zipcode</label>
                            <input type="number" id="zipcode" name="zipcode" v-model="form.zipcode"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        

                        <button v-if="formFilled || userAddress" type="submit"
                            class="text-white bg-black border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded text-lg">Checkout</button>

                        <button v-else type="submit"
                            class="text-white bg-black border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded text-lg">Add Shipping
                            Address to continue</button>



                    </form>

                    <p class="text-xs text-gray-500 mt-3">Continue Shopping</p>
                </div>
            </div>
        </section>
    </UserLayouts>


</template>