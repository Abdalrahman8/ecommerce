<script setup>
 import store from './src/store';

const test = computed(() => store.state.test)
</script>

<template>
  <div>
  <div class="pt-6 space-y-4">
    <blockquote>
      <p class="text-lg font-medium bg-purple-500">
        “Tailwind CSS is the only framework that I've seen scale
        on large teams. It’s easy to customize, adapts to any design,
        and the build size is tiny.”
      </p> {{ test }}
    </blockquote>>
  </div>
    
  </div>
</template>
