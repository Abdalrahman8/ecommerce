<template>
    <div class="h-screen bg-gray-200 flex">
      <!--    Sidebar-->
      <Sidebar :class="{'-ml-[200px]': !sidebarOpened}"/>
      <!--/    Sidebar-->
  
      <div class="flex-1">
        <Navbar @toggle-sidebar="toggleSidebar"></Navbar>
        <!--      Content-->
        <main class="p-6">
          content goes here
        </main>
        <!--      Content-->
      </div>
    </div>
  </template>
  
  <script setup>
  const {title} = defineProps({
    title: String
  })
  
  const sidebarOpened = ref(true);
  
  function toggleSidebar() {
    sidebarOpened.value = !sidebarOpened.value
  }
  </script>
  
  <style scoped>
  
  </style>
  