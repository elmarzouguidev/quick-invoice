import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { ZiggyVue } from 'ziggy-js'
import { Ziggy } from './ziggy'

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('../Pages/**/*.vue', { eager: true })
    const page = pages[`../Pages/${name}.vue`]
    
    if (!page) {
      throw new Error(`Page ${name} not found.`)
    }
    
    return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue, Ziggy)
      .mount(el)
  },
})