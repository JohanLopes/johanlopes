module.exports = {
  /*
  ** Headers of the page
  */
  head: {
    title: 'Johan LOPES | Chef de projet & Développeur web freelance | Spécialiste Symfony & Vue.Js',
    meta: [
      { charset: 'utf-8' },
      { language: 'fr' },
      { robots: 'index, follow' },
      { author: 'Johan LOPES' },
      { keywords: 'freelance, indépendant, consultant, expert, web, symfony, développeur, entrepreneuriat, scrum master, chef de projet, portfolio, auto entrepreneur, lyon, Rhône Alpes, php, site, internet, cv, intégration, ergonomie, accessibilité, isère' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1, maximum-scale=1' },
      { hid: 'description', name: 'description', content: 'Chef de projet web, Développeur web, Expert Php & Symfony. Découvrez les services que je propose et mes réalisations...' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
      { rel: 'stylesheet', href: 'https://fonts.googleapis.com/css?family=Kalam' },
      { rel: 'stylesheet', href: 'https://fonts.googleapis.com/css?family=Lato:300,400,700' }
    ],
    htmlAttrs: {
      lang: 'fr',
      amp: true
    },
    bodyAttrs: {
      'data-spy': 'scroll',
      'data-target': '#topbar',
      'data-offset': '60'
    }
  },
  /*
  ** Customize the progress bar color
  */
  loading: { color: '#3B8070' },
  /*
  ** Build configuration
  */
  build: {
    extend (config, { isDev, isClient }) {
      config.module.rules.push({
        test: /\.ya?ml$/,
        loader: 'js-yaml-loader',
      })

      config.module.rules.push({
        test: /\.md$/,
        loader: 'frontmatter-markdown-loader',
        options: {
          vue: true
        }
      })

      /*
      ** Run ESLint on save
      */
      if (isDev && isClient) {
        config.module.rules.push({
          enforce: 'pre',
          test: /\.(js|vue)$/,
          loader: 'eslint-loader',
          exclude: /(node_modules)/
        })
      }
    }
  },
  /*
  ** Modules configuration
  */
  modules: [
      ['bootstrap-vue/nuxt', { bootstrapCSS: false, bootstrapVueCSS: false }],
      '@nuxt/http',
      ['@nuxtjs/recaptcha', { siteKey: '6LdrX6cUAAAAAAcZnmPjhhUMUbuHBR9qnXJEEIWV', language: 'fr', version: 2 }],
      ['@nuxtjs/google-tag-manager', { id: 'GTM-PWDXC6H', dev: false }],
  ],

  /*
  ** plugins
  */
  plugins: [{
      src:'~plugins/vue-scrollactive.js',
      ssr:false
  },{
      src:'~plugins/textarea-autosize.js',
      ssr:false
  }],

  /*
  ** Routing
  */
  router: {
    extendRoutes (routes, resolve) {
      routeIndex = routes.findIndex(element => element.name === 'index');
      routes[routeIndex].children.unshift({ path: 'projects', redirect: { name: 'index' }})
    },
    scrollBehavior (to, from, savedPosition) {
      return false
    }
  }
}
