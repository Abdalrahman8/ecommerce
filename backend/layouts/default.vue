<!-- <template>
    <html class="h-full bg-white">
      <body class="h-full">
        <NuxtPage />
      </body>
    </html>
  </template> -->

  <template>
    <div class="h-screen bg-gray-200 flex">
      <!--    Sidebar-->
      <Sidebar :class="{'-ml-[200px]': !sidebarOpened}"/>
      <!--/    Sidebar-->
  
      <div class="flex-1">
        <Navbar @toggle-sidebar="toggleSidebar"></Navbar>
        <!--      Content-->
        <main class="p-6">
          <NuxtPage />
        </main>
        
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

  function updateSidebarState() {
  sidebarOpened.value = window.outerWidth > 768;
}

onMounted(() => {
  updateSidebarState();
  window.addEventListener('resize', updateSidebarState)
})

onUnmounted(() => {
  window.removeEventListener('resize', updateSidebarState)
})
  </script>
  
  <style scoped>
  
  </style>
  