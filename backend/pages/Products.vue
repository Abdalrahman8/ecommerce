<template>
  <div>
    <div class="flex items-center justify-between mb-3">
      <h1 class="text-3xl font-semibold">Products</h1>
      <button
        type="button"
        @click="showAddNewModal()"
        class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
      >
        Add new Product
      </button>
    </div>
    <div class="bg-white p-4 rounded-lg shadow">
      <div class="flex justify-between border-b-2 pb-3">
        <div class="flex items-center">
          <span class="whitespace-nowrap mr-3">Per Page</span>
          <select
            @change="getProducts()"
            v-model="perPage"
            class="appearance-none relative block w-24 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
          >
            <option value="5">5</option>
            <option value="10">10</option>
            <!-- ... -->
          </select>
        </div>
        <div>
          <input
            v-model="search"
            @change="getProducts()"
            class="appearance-none relative block w-48 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
            placeholder="Type to Search products"
          />
        </div>
      </div>
      
      <!-- Include ProductTable component -->
      <ProductTable
        :products="products"
        :sortField="sortField"
        :sortDirection="sortDirection"
        @sortProducts="sortProducts"
        @getForPage="getForPage"
        @edit-product="editProduct"
        @delete-product="deleteProduct"
      />
    </div>
    <!-- Pass the selected product to AddNewProduct component -->
    <AddNewProduct v-model="showProductModal" :product="product" />
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';
import store from '../src/store/index.js';
import ProductTable from '~/components/products/ProductTable.vue';
import AddNewProduct from '~/components/products/AddNewProduct.vue';

const PRODUCTS_PER_PAGE = 5;

const perPage = ref(PRODUCTS_PER_PAGE);
const search = ref('');
const products = computed(() => store.state.products);
const sortField = ref('updated_at');
const sortDirection = ref('desc');
const showProductModal = ref(false);
const product = ref({});

onMounted(() => {
  getProducts();
});

function getProducts(url = null) {
  store.dispatch('getProducts', {
    url,
    search: search.value,
    perPage: perPage.value,
    sortField: sortField.value,
    sortDirection: sortDirection.value,
  });
}

function sortProducts(field) {
  if (field === sortField.value) {
    sortDirection.value = sortDirection.value === 'asc' ? 'desc' : 'asc';
  } else {
    sortField.value = field;
    sortDirection.value = 'asc';
  }
  getProducts();
}

function getForPage(url) {
  getProducts(url);
}

function showAddNewModal(p = null) {
  if (p) {
    product.value = { ...p };
  } else {
    product.value = {
      title: '',
      image: null,
      description: '',
      price: '',
    };
  }
  showProductModal.value = true;
}

function editProduct(p) {
  // Optionally fetch the product from the server
  // store.dispatch('getProduct', p.id).then(({ data }) => {
  //   product.value = data;
  //   showAddNewModal();
  // });
  product.value = { ...p };
  showAddNewModal(p);
}

function deleteProduct(p) {
  if (!confirm(`Are you sure you want to delete the product "${p.title}"?`)) {
    return;
  }
  store.dispatch('deleteProduct', p.id).then(() => {
    getProducts();
  });
}
</script>

<style scoped>
/* Add any component-specific styles here */
</style>
