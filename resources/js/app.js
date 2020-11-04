/*
|----------------------------------------------------------------
| Vue 3
|update your main JavaScript file to boot your Inertia app.
|All we're doing here is initializing the client-side framework
|with the base Inertia page component.
|----------------------------------------------------------------
*/
require('./bootstrap');

import { App, plugin } from '@inertiajs/inertia-vue'
import Vue from 'vue'

Vue.use(plugin)

const el = document.getElementById('app')

new Vue({
  render: h => h(App, {
    props: {
      initialPage: JSON.parse(el.dataset.page),
      resolveComponent: name => require(`./Pages/${name}`).default,
    },
  }),
}).$mount(el)
