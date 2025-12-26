export const useAuth = () => {
  const token = useCookie<string | null>('token')

  const config = useRuntimeConfig()

  const login = async (email: string, password: string) => {
    const res: any = await $fetch(`${config.public.apiBase}/auth/login`, {
      method: 'POST',
      body: { email, password }
    })

    token.value = res.token
    return res.user
  }

  const me = async () => {
    return await $fetch(`${config.public.apiBase}/me`, {
      headers: {
        Authorization: `Bearer ${token.value}`
      }
    })
  }

  const logout = async () => {
    await $fetch(`${config.public.apiBase}/auth/logout`, {
      method: 'POST',
      headers: {
        Authorization: `Bearer ${token.value}`
      }
    })

    token.value = null
  }

  return { token, login, me, logout }
}
