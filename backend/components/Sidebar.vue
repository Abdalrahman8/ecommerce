<template>
    <div class="w-[200px]  transition-all bg-indigo-700 text-white py-4 px-2">
      <NuxtLink to="/dashboard"
                   class="flex items-center p-2 rounded transition-colors hover:bg-black/30">
        <span class="mr-2 text-gray-300">
          <HomeIcon class="w-5"/>
        </span>
        <span class="text-xs">
          Dashboard
        </span>
      </NuxtLink>
      <NuxtLink to="products"
                   class="flex items-center p-2 rounded transition-colors hover:bg-black/30">
        <span class="mr-2 text-gray-300">
          <ViewListIcon class="w-5"/>
        </span>
        <span class="text-xs">
          Products
        </span>
      </NuxtLink>
      <NuxtLink to="/users"
                   class="flex items-center p-2 rounded transition-colors hover:bg-black/30">
        <span class="mr-2 text-gray-300">
          <UsersIcon class="w-5"/>
        </span>
        <span class="text-xs">
          Users
        </span>
      </NuxtLink>
      <NuxtLink to="/users"
                   class="flex items-center p-2 rounded transition-colors hover:bg-black/30">
        <span class="mr-2 text-gray-300">
          <ChartBarIcon class="w-5"/>
        </span>
        <span class="text-xs">
          Reports
        </span>
      </NuxtLink>
    </div>
  </template>
  
  <script setup>
    import {HomeIcon, UsersIcon, ViewListIcon, ChartBarIcon} from '@heroicons/vue/outline'
  </script>
  
  <style scoped>
  
  </style>
  