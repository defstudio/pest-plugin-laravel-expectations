import theme from '@nuxt/content-theme-docs'

export default theme({
  docs: {
    primaryColor: '#20cbff'
  },
  target: 'static',
  content: {
    liveEdit: false
  },
  router: {
    base: '/pest-plugin-laravel-expectations'
  }
})
