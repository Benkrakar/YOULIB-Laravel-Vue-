import Vue from "vue";
import Vuex from "vuex";
import auth from "./modules/admin/auth";
import categories from "./modules/tools/categories";
import subcategories from "./modules/tools/subcategories";
import products from "./modules/tools/products";
import profiles from "./modules/tools/profiles";
import carte from "./modules/tools/carte";
import commandes from "./modules/tools/commandes";
import messages from "./modules/tools/messages";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        serverpath: "http://127.0.0.1:8000"
    },
    mutations: {},
    actions: {},
    modules: {
        categories,
        products,
        profiles,
        subcategories,
        auth,
        carte,
        commandes,
        messages
    }
});
