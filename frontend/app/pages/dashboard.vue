<script setup lang="ts">
definePageMeta({
  middleware: 'auth'
})

const { me, logout } = useAuth()
const user = await me()
</script>

<template>
  <div>
    <h1>Dashboard</h1>
    <p>Halo, {{ user.name }}</p>

    <button @click="logout">Logout</button>
  </div>
</template>
