import Vue from "vue";
import VueRouter from "vue-router";
import routes from "./routes";
import { BootstrapVue } from "bootstrap-vue";
import VueTyperPlugin from "vue-typer";
import App from "./views/App.vue";
import store from "./store/store.js";
import Vuex, { mapGetters } from "vuex";
import axios from "axios";
import VueSweetalert2 from "vue-sweetalert2";

axios.defaults.baseURL = "http://127.0.0.1:8000/api";

Vue.component("pagination", require("laravel-vue-pagination"));

Vue.use(VueRouter);
Vue.use(VueTyperPlugin);
Vue.use(Vuex);
Vue.use(VueSweetalert2);

Vue.use(BootstrapVue);

store.dispatch("auth/attempt", localStorage.getItem("token")).then(() => {
    new Vue({
        store,
        render: h => h(App),
        router: new VueRouter(routes)
    }).$mount("#app");
});
