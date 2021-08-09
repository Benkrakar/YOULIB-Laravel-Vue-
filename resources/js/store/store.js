import Vue from "vue";
import Vuex from "vuex";
import auth from "./modules/auth"
import categories from "./categores"
import products from "./products"
import profiles from "./profiles"

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
       serverpath:'http://127.0.0.1:8000'
    },
    mutations: {

    },
    actions: {
        
    },
    modules: {
        categories,
        products,
        profiles,
        auth
    }
})