<template>
    <div>
      <table class="table-auto w-full">
        <thead>
          <tr>
            <TableHeaderCell
              field="id"
              :sortField="sortField"
              :sortDirection="sortDirection"
              @click="sortProducts('id')"
            >
              ID
            </TableHeaderCell>
            <TableHeaderCell
              field="image"
              :sortField="sortField"
              :sortDirection="sortDirection"
            >
              Image
            </TableHeaderCell>
            <TableHeaderCell
              field="title"
              :sortField="sortField"
              :sortDirection="sortDirection"
              @click="sortProducts('title')"
            >
              Title
            </TableHeaderCell>
            <TableHeaderCell
              field="price"
              :sortField="sortField"
              :sortDirection="sortDirection"
              @click="sortProducts('price')"
            >
              Price
            </TableHeaderCell>
            <TableHeaderCell
              field="updated_at"
              :sortField="sortField"
              :sortDirection="sortDirection"
              @click="sortProducts('updated_at')"
            >
              Last Updated At
            </TableHeaderCell>
          </tr>
        </thead>
        <tbody>
          <tr v-for="product in products.data" :key="product.id">
            <td>{{ product.id }}</td>
            <td>
              <img :src="product.image_url" :alt="product.title" class="w-16 h-16 object-cover" />
            </td>
            <td>{{ product.title }}</td>
            <td>{{ product.price }}</td>
            <td>{{ product.updated_at }}</td>
            <td>
              <button @click="$emit('edit-product', product)" class="text-blue-500">Edit</button>
              <button @click="$emit('delete-product', product)" class="text-red-500 ml-2">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
  
      <!-- Pagination -->
      <div class="flex justify-between items-center mt-5">
        <span>
          Showing from {{ products.from }} to {{ products.to }}
        </span>
        <nav
          v-if="products.total > products.limit"
          class="relative z-0 inline-flex justify-center rounded-md shadow-sm -space-x-px"
          aria-label="Pagination"
        >
          <a
            v-for="(link, i) in products.links"
            :key="i"
            :disabled="!link.url"
            href="#"
            @click.prevent="getForPage(link)"
            aria-current="page"
            class="relative inline-flex items-center px-4 py-2 border text-sm font-medium whitespace-nowrap"
            :class="[
              link.active
                ? 'z-10 bg-indigo-50 border-indigo-500 text-indigo-600'
                : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50',
              i === 0 ? 'rounded-l-md' : '',
              i === products.links.length - 1 ? 'rounded-r-md' : '',
              !link.url ? ' bg-gray-100 text-gray-700' : '',
            ]"
            v-html="link.label"
          ></a>
        </nav>
      </div>
    </div>
  </template>
  
  <script setup>

  import TableHeaderCell from './TableHeaderCell.vue';
  
  const props = defineProps({
    products: {
      type: Object,
      required: true,
    },
    sortField: {
      type: String,
      required: true,
    },
    sortDirection: {
      type: String,
      required: true,
    },
  });
  
  const emit = defineEmits(['sortProducts', 'getForPage', 'sortProducts', 'getForPage']);
  
  function sortProducts(field) {
    emit('sortProducts', field);
  }
  
  function getForPage(link) {
    if (!link.url || link.active) {
      return;
    }
    emit('getForPage', link.url);
  }
  </script>
  
  <style scoped>
  
  </style>
  