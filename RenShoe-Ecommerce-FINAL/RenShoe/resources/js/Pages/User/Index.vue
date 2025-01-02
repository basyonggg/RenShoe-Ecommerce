<script setup>
import { Link, router } from '@inertiajs/vue3';
import UserLayouts from './Layouts/UserLayouts.vue';
import Hero from './Layouts/Hero.vue';
import Products from '../User/Components/Products.vue'

//Product List
defineProps({
    products: Array
})



</script>

<template>
    <UserLayouts>
        <!--HERO SECTION-->
        <Hero></Hero>
        <!--END HERO SECTION-->

        <div class="bg-white">
            <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900 text-center">Featured Products</h2>

                <!--PRODUCT LIST COMPONENT-->
                <Products :products="products"></Products>


                <!--END PRODUCT LIST COMPONENT-->
                
                <div class="flex justify-center mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                    <Link type="button" :href="route('products.index')" class="text-white bg-black hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Explore more Products</Link>

                </div>

        <!--HERO1 SECTION-->
            <Hero1></Hero1>
        <!--END HERO1 SECTION-->
            </div>
        </div>
    </UserLayouts>



</template>