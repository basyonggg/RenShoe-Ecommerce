
<template>
  <AdminLayout>
    <div>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4 justify-center">
        <div class="border-2 border-dashed border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64 flex flex-col items-center justify-center">
          <p class="text-xl font-bold text-gray-700 dark:text-gray-300">Total Products</p>
          <span class="text-4xl font-extrabold text-blue-600">{{ Products }}</span>
      </div>

      <div class="border-2 border-dashed border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64 flex flex-col items-center justify-center">
        <p class="text-xl font-bold text-gray-700 dark:text-gray-300">Total Users</p>
        <span class="text-4xl font-extrabold text-blue-600">{{ totalUsers }}</span>
      </div>

      <div class="border-2 border-dashed border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64 flex flex-col items-center justify-center">
        <p class="text-xl font-bold text-gray-700 dark:text-gray-300">Total Users</p>
        <span class="text-4xl font-extrabold text-blue-600">{{ Products }}</span>
      </div>
      </div>  
    </div>  
          <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-96 mb-4">asdas</div>
  </AdminLayout>

</template>

<script setup>
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'
import AdminLayout from './Components/AdminLayout.vue';

// initialize components based on data attribute selectors
onMounted(() => {
    initFlowbite();
})
</script>

