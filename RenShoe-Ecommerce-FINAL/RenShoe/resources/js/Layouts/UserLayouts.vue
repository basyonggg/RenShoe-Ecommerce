<script setup>
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'
import Header from './Header.vue';
import Footer from './Footer.vue';

// initialize components based on data attribute selectors
onMounted(() => {
    initFlowbite();
})





</script>

<template>
    <!--HEADER-->
    <Header></Header>

    <!--END HEADER-->

    <!--MAIN USER CONTENT-->
   
    <slot />

    <!--END MAIN USER CONTENT-->


    <!--FOOTER-->
    <Footer></Footer>

    <!--END FOOTER-->


</template>