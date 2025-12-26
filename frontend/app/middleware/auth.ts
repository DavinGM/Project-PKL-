export default defineNuxtRouteMiddleware(async () => {
  const { token, me } = useAuth()

  if (!token.value) {
    return navigateTo('/login')
  }

  try {
    await me()
  } catch {
    return navigateTo('/login')
  }
})
