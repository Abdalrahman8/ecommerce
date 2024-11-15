import { createStore } from "vuex";
import axiosClient from "./axios";

const store = createStore({
  state: {
    user: {
      data: {},
      // token: sessionStorage.getItem('TOKEN'),
      token: process.client ? sessionStorage.getItem('TOKEN') : null,
    },
    products: {
      loading: false,
      data: [],
      links: [],
      page: 1,
      limit: 10,
      from: null,
      to: null,
      total: null,
    },
  },
  getters: {},
  actions: {
    getUser({ commit }, data) {
      return axiosClient.get('/user', data)
        .then(({ data }) => {
          commit('setUser', data);
          return data;
        });
    },
    login({ commit }, data) {
      return axiosClient.post('/login', data)
        .then(({ data }) => {
          commit('setUser', data.user);
          commit('setToken', data.token);
          return data;
        });
    },
    logout({ commit }) {
      return axiosClient.post('/logout')
        .then((response) => {
          commit('setToken', null);
          return response;
        });
    },
    getProducts({ commit }, { url = null, search, perPage, sortField, sortDirection }) {
        commit('setProducts', [true]);
        url = url || '/products';
        return axiosClient.get(url, {
          params: {
            search,
            per_page: perPage,
            sort_field: sortField,
            sort_direction: sortDirection,
          },
        })
          .then((response) => {
            commit('setProducts', [false, response.data]);
          })
          .catch(() => {
            commit('setProducts', [false]);
          });
      },
  },
  mutations: {
    setUser(state, user) {
      state.user.data = user;
    },
    setToken(state, token) {
      state.user.token = token;
      if (token) {
        sessionStorage.setItem('TOKEN', token);
      } else {
        sessionStorage.removeItem('TOKEN');
      }
    },
    setProducts(state, [loading, data = null]) {
      if (data) {
        state.products = {
          ...state.products,
          data: data.data,
          links: data.meta?.links,
          page: data.meta.current_page,
          limit: data.meta.per_page,
          from: data.meta.from,
          to: data.meta.to,
          total: data.meta.total,
        };
      }
      state.products.loading = loading;
    },
  },
});

export default store;
