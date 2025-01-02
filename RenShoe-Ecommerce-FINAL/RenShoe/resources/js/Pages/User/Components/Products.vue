<script setup>
import { Link, router } from '@inertiajs/vue3';


defineProps({
    products: Array
})


const addToCart = (product) => {
    console.log(product)
    router.post(route('cart.store', product), {
        onSuccess: (page) => {
            if (page.props.flash.success) {
                Swal.fire({
                    toast: true,
                    icon: "success",
                    position: "top-end",
                    showConfirmButton: false,
                    title: page.props.flash.success

                });
            }
        },
    })
}

</script>

<template>
    <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
        <div v-for="product in products" :key="product.id" class="group relative">
            <img v-if="product.product_images.length > 0" :src="`/${product.product_images[0].image}`"
                :alt="product.imageAlt"
                class="aspect-square w-full rounded-md bg-transparent object-cover group-hover:opacity-75 lg:aspect-auto lg:h-80" />
            <img v-else
                src="https://atticrrg.com/wp-content/uploads/2022/07/Untitled-Phone-Wallpaper-e1718385340165-731x1024.png"
                :alt="product.imageAlt"
                class="aspect-square w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-80" />

            <!--ADD TO CART HOVER BUTTON-->
            <div
                class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 cursor-pointer">
                <div class="bg-white p-2 rounded-full shadow-md">
                    <a @click="addToCart(product)">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd"
                                d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>



                </div>
                <div class="bg-white p-2 rounded-full shadow-md ml-4">
                    <a href="detail">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                            <path fill-rule="evenodd"
                                d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>



                </div>
            </div>


            <!--END ADD TO CART HOVER BUTTON-->

            <div class="mt-4 flex justify-between">
                <div>
                    <h3 class="text-sm text-gray-700">

                        <span aria-hidden="true" class="" />
                        {{ product.product_name }}

                    </h3>
                    <p class="mt-1 text-sm text-gray-500">{{ product.brand.name }}</p>
                </div>
                <p class="text-sm font-medium text-gray-900">${{ product.price }}</p>
            </div>
        </div>
    </div>


</template>