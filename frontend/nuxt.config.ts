export default defineNuxtConfig({
  ssr: false, // SPA biar simple (kampus friendly)
  devtools: { enabled: true },

  runtimeConfig: {
    public: {
      apiBase: 'http://127.0.0.1:8000/api'
    }
  }
})
