import home from "./pages/public/home.vue";
import cart from "./pages/public/cart.vue";
import checkout from "./pages/public/checkout.vue";
import allproduct from "./pages/public/allproduct.vue";
import singleproduct from "./pages/public/singleproduct.vue";
import contact from "./pages/public/contact.vue";
import login from "./pages/auth/login.vue";
import register from "./pages/auth/RegisterForm.vue";
import dashboard from "./pages/dashboard/dashboard.vue";
import table from "./pages/dashboard/table.vue";
import messages from "./pages/dashboard/messages.vue";
import produits from "./pages/dashboard/produits.vue";
import commandes from "./pages/dashboard/commandes.vue";
import categories from "./pages/dashboard/categories.vue";
import profile from "./pages/dashboard/Profile.vue";
import store from "./store/store";
const routes = [
    {
        path: "/cart",
        component: cart
    },
    {
        path: "/home",
        name: "home",
        component: home
    },
    {
        path: "/contact",
        name: "contact",
        component: contact
    },
    {
        path: "/checkout",
        name: "checkout",
        component: checkout
    },

    {
        path: "/all",
        name: "all",
        component: allproduct
    },
    {
        path: "/all/:id",
        name: "allwithsubcategorie",
        component: allproduct
    },
    {
        path: "/single/:id",
        name: "single",
        component: singleproduct
    },
    {
        path: "/login",
        name: "login",
        component: login
    },
    {
        path: "/register",
        name: "register",
        component: register
    },

    {
        path: "/dashboard",
        component: dashboard,
        beforeEnter: (to, from, next) => {
            // && !store.getters['auth/user'].role == 'admin')
            if (
                !store.getters["auth/authenticated"] &&
                store.getters["auth/user"] == null
            ) {
                return next({
                    name: "login"
                });
            } else if (store.getters["auth/user"].role != "admin") {
                return next({
                    name: "home"
                });
            }
            next();
        },
        children: [
            {
                path: "table",
                component: table
            },
            {
                path: "produits",
                component: produits
            },
            {
                path: "commandes",
                component: commandes
            },
            {
                path: "categories",
                component: categories
            },
            {
                path: "messages",
                component: messages
            },
            {
                path: "profile",
                component: profile
            }
        ]
    }
];

export default {
    mode: "history",
    routes
};
