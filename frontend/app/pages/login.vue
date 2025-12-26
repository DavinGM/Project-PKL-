<script setup lang="ts">
const email = ref('')
const password = ref('')
const error = ref('')

const { login } = useAuth()

const submit = async () => {
  try {
    await login(email.value, password.value)
    navigateTo('/dashboard')
  } catch {
    error.value = 'Login gagal'
  }
}
</script>

<template>
  <div>
    <h1>Login</h1>

    <p v-if="error">{{ error }}</p>

    <input v-model="email" placeholder="Email" />
    <input v-model="password" type="password" placeholder="Password" />

    <button @click="submit">Login</button>
  </div>
</template>
