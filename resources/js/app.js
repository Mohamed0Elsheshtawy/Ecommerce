import './bootstrap';
import '../css/app.css';

 // import swiper module styles
 import 'swiper/css'
 import 'swiper/css/pagination'
 import 'swiper/css/navigation'

 // more module style...

import { createApp } from 'vue';


import router  from './router'
//import products  from './stores/products'
//import axios from "axios";

import { createPinia } from 'pinia'
import App from './Pages/App.vue'
import piniaPluginPersistedstate from 'pinia-plugin-persistedstate'
import mitt from "mitt";
import '@mdi/font/css/materialdesignicons.css'
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

const vuetify = createVuetify({
  components,
  directives
})
const Emitter = mitt();


const pinia = createPinia()
pinia.use(piniaPluginPersistedstate)

const app = createApp(App);
//app.use(products)
//app.use(axios)
 app.use(router)
app.use(pinia)
app.use(vuetify)
app.provide('Emitter', Emitter)
app.mount('#app');
