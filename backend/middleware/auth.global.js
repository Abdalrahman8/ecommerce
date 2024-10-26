// middleware/auth.global.js
export default defineNuxtRouteMiddleware((to, from) => {
  // Check if we're on the client side
  if (process.client) {
    const token = localStorage.getItem("token");

    // Redirect to login if trying to access protected routes without a token
    if (!token && to.path !== "/login") {
      return navigateTo("/login");
    }

    // Redirect to dashboard if trying to access the login page when already logged in
    if (token && to.path === "/login") {
      return navigateTo("/dashboard");
    }
  }
});
