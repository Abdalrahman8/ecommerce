import axios from "axios";

const axiosClient = axios.create({
  baseURL: `${import.meta.env.VITE_API_BASE_URL}/api`
});

// Request interceptor to add the Authorization header
axiosClient.interceptors.request.use(config => {
  const token = localStorage.getItem('token');
  if (token) {
    config.headers.Authorization = `Bearer ${token}`;
  }
  return config;
});

// Response interceptor to handle 401 errors
axiosClient.interceptors.response.use(
  response => {
    return response;
  },
  error => {
    if (error.response && error.response.status === 401) {
      // Remove token from localStorage and redirect to login
      localStorage.clear();
      // localStorage.removeItem('user'); // optional, if you're also storing user data
      this.$router.push('/login');

    }
    return Promise.reject(error);
  }
);

export default axiosClient;
