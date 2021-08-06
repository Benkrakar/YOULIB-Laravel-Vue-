import Vue from "vue";
import Vuex from "vuex";
import auth from "./modules/admin/auth"

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
        auth
    }
})