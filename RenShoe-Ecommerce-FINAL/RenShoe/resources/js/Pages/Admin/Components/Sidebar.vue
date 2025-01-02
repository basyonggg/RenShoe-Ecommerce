<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <aside class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-black text-white border-r border-gray-700 md:translate-x-0" aria-label="Sidenav" id="drawer-navigation">
    <div class="overflow-y-auto py-5 px-3 h-full bg-black text-white">
      <form action="#" method="GET" class="md:hidden mb-2">
        <label for="sidebar-search" class="sr-only">Search</label>
        <div class="relative">
          <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
            <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"></path>
            </svg>
          </div>
          <input type="text" name="search" id="sidebar-search" class="bg-gray-800 border border-gray-600 text-white text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full pl-10 p-2" placeholder="Search" />
        </div>
      </form>

      <!--Sidebar-->
      <ul class="space-y-2">
        <li>
          <Link :href="route('admin.dashboard')" class="flex items-center p-2 text-base font-medium text-white rounded-lg hover:bg-gray-700 group">
            <svg aria-hidden="true" class="w-6 h-6 text-gray-400 transition duration-75 group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
              <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
            </svg>
            <span class="ml-3">Dashboard</span>
          </Link>
        </li>
        <li>
          <Link :href="route('admin.products.index')" class="flex items-center p-2 text-base font-medium text-white rounded-lg hover:bg-gray-700 group">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400 transition duration-75 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
              <path fill-rule="evenodd" d="M14.25 2.5a.25.25 0 0 0-.25-.25H7A2.75 2.75 0 0 0 4.25 5v14A2.75 2.75 0 0 0 7 21.75h10A2.75 2.75 0 0 0 19.75 19V9.147a.25.25 0 0 0-.25-.25H15a.75.75 0 0 1-.75-.75zm.75 9.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1 0-1.5zm0 4a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1 0-1.5z" clip-rule="evenodd" />
              <path d="M15.75 2.824c0-.184.193-.301.336-.186q.182.147.323.342l3.013 4.197c.068.096-.006.22-.124.22H16a.25.25 0 0 1-.25-.25z" />
            </svg>
            <span class="ml-3">Orders</span>
          </Link>
        </li>
        <li>
          <Link :href="route('admin.products.index')" class="flex items-center p-2 text-base font-medium text-white rounded-lg hover:bg-gray-700 group">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400 transition duration-75 group-hover:text-white" fill="currentColor" viewBox="0 0 20 20">
              <path d="M17 8h1v11H2V8h1V6c0-2.76 2.24-5 5-5c.71 0 1.39.15 2 .42A4.9 4.9 0 0 1 12 1c2.76 0 5 2.24 5 5zM5 6v2h2V6c0-1.13.39-2.16 1.02-3H8C6.35 3 5 4.35 5 6m10 2V6c0-1.65-1.35-3-3-3h-.02A4.98 4.98 0 0 1 13 6v2zm-5-4.22C9.39 4.33 9 5.12 9 6v2h2V6c0-.88-.39-1.67-1-2.22" />
            </svg>
            <span class="ml-3">Products</span>
          </Link>
        </li>
        <li>
          <Link :href="route('admin.products.index')" class="flex items-center p-2 text-base font-medium text-white rounded-lg hover:bg-gray-700 group">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400 transition duration-75 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
              <path d="M4 17q-.825 0-1.412-.587T2 15V7.15q0-.375.213-.737T2.8 5.85L10.5 2l7.55 3.85q.3.15.513.475T18.85 7h-2.925L10.5 4.25L4 7.475zm3 4q-.825 0-1.412-.587T5 19v-9q0-.825.588-1.412T7 8h13q.825 0 1.413.588T22 10v9q0 .825-.587 1.413T20 21zm6.5-5.65L20 12v-2l-6.5 3.35L7 10v2z" />
            </svg>
            <span class="ml-3">Inbox</span>
          </Link>
        </li>
        <li>
        </li>
      </ul>
    </div>
  </aside>
</template>
