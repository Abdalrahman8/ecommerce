<template>
    <th
      @click="emit('click')"
      class="border-b-2 p-2 text-left cursor-pointer"
      :class="{ 'bg-blue-50': field === sortField }"
    >
      <div class="flex justify-between items-center">
        <slot></slot>
        <div v-if="sortField === field" class="ml-2">
          <!-- Sort Ascending Icon -->
          <svg
            v-if="sortDirection === 'asc'"
            xmlns="http://www.w3.org/2000/svg"
            class="h-4 w-4"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M5 15l7-7 7 7"
            />
          </svg>
          <!-- Sort Descending Icon -->
          <svg
            v-else
            xmlns="http://www.w3.org/2000/svg"
            class="h-4 w-4"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M19 9l-7 7-7-7"
            />
          </svg>
        </div>
      </div>
    </th>
  </template>
  
  <script setup>
  const props = defineProps({
    field: String,
    sortField: String,
    sortDirection: String,
  });
  
  const emit = defineEmits(['click']);
  </script>
  
  <style scoped>
  /* Optional styles */
  </style>
  