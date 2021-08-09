import home from './pages/public/home.vue'
import cart from './pages/public/cart.vue'
import checkout from './pages/public/checkout.vue'
import allproduct from './pages/public/allproduct.vue'
import login from './pages/auth/login.vue'
import register from './pages/auth/RegisterForm.vue'
import dashboard from './pages/dashboard/dashboard.vue'
import table from './pages/dashboard/table.vue'
import produits from './pages/dashboard/produits.vue'
import commandes from './pages/dashboard/commandes.vue'
import categories from './pages/dashboard/categories.vue'
import profile from './pages/dashboard/Profile.vue'
import settings from './pages/dashboard/settings.vue'
import store from './store/store'
const routes = [
    {
        path: '/cart',
        component: cart
    },
    {
        path: '/home',
        name:'home',
        component: home
    },
    {
        path: '/checkout',
        component: checkout
    },
  
    {
        path: '/all',
        component: allproduct
    },
    {
        path: '/login',
        name: 'login',
        component: login
    },
    {
      path: '/register',
      name:'register',
      component: register
  },
   
    {
        path: '/dashboard',
        component: dashboard,
        children: [
          {
            path: 'table',
            component: table,
          },
          {
            path: 'produits',
            component: produits,
          },
          {
            path: 'commandes',
            component: commandes,
          },
          {
            path: 'categories',
            component: categories,
          },
          {
            path: 'profile',
            component: profile,
          },
          {
            path: 'settings',
            component: settings,
          }
        ]
      }
]


export default {
    mode:'history',
    routes
} 