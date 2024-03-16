// router/index.js
import { createRouter, createWebHistory } from 'vue-router'

import Home from '@/Pages/Home.vue'

const routes = [
  
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/productes/:category/:title',
        name: 'productes_category',
        component:()=> import("@/Pages/ProductCategory.vue")
    },
    {
        path: '/productes/product-details/:productId',
        name: 'productes-details',
        component:()=> import("@/Pages/ProductDetails.vue")
    },
    {
        path: '/cart-page',
        name: 'cart-page',
        component:()=> import("@/Pages/CarPage.vue")
    }
]

const router = createRouter({ history: createWebHistory(), routes, 
scrollBehavior(){
    return {top: 0}
}
})
export default router
