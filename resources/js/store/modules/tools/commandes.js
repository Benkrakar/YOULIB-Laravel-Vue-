import axios from "axios";
export default {
    namespaced: true,
    state: {
        commande: null,
        commandeproducts: null
    },
    getters: {
        commande(state) {
            return state.commande;
        },
        commande_products(state) {
            return state.commandeproducts;
        },
        cartCount(state) {
            return state.cartCount;
        }
    },
    mutations: {
        SET_COMMANDE: (state, data) => {
            state.commande = data;
            window.localStorage.setItem(
                "commande",
                JSON.stringify(state.commande)
            );
        },
        SET_COMMANDE_PRODUCTS: (state, data) => {
            state.commandeproducts = data;
        },
        DELETE_COMMANDE: (state, id) => {
            state.commande.data = state.commande.data.filter(
                data => data.id !== id
            );
        },
        UPDATE_COMMANDE: (state, data) => {
            state.commande.forEach(n => {
                if (n.id == data.id) {
                    n = data;
                }
            });
        },
        GET_COMMANDE(state, data) {
            state.commande = data;
        },
        GET_COMMANDE_PRODUCTS(state, data) {
            // console.log(data)
            state.commandeproducts = data;
        },
        removeCommande(state) {
            state.commande = null;

            window.localStorage.removeItem("commande");
        }
    },
    actions: {
        async get_commande({ commit }) {
            let response = await axios.get("/commande", {
                headers: {
                    Authorization: "Bearer " + localStorage.getItem("token")
                }
            });
            commit("GET_COMMANDE", response.data.data);
        },
        
        async get_commandes_paginated({ commit }, page) {
            let response = await axios.get("/commandepaginated?page=" + page, {
                headers: {
                    Authorization: "Bearer " + localStorage.getItem("token")
                }
            });
            commit("GET_COMMANDE", response.data.data);
        },
        async creat_commande({ commit }, credentials) {
            let response = await axios.post("/postcommande", credentials);
            commit("SET_COMMANDE", response.data.data);
            // console.log(credentials.data)
        },
        async creat_commande_products({ commit }, credentials) {
            let response = await axios.post("/commandeproducts", credentials, {
                headers: {
                    Authorization: "Bearer " + localStorage.getItem("token")
                }
            });
            commit("SET_COMMANDE_PRODUCTS", response.data.data);
            console.log(response.data.data);
        },
        async get_commande_products({ commit }, id) {
            let response = await axios.get(`/commandeproduct/commande/${id}`, {
                headers: {
                    Authorization: "Bearer " + localStorage.getItem("token")
                }
            });
            commit("GET_COMMANDE_PRODUCTS", response.data.data);
            // console.log(response.data.data)
        },
        async delete_commande({ commit }, id) {
            await axios.delete(`/commande/${id}`, {
                headers: {
                    Authorization: "Bearer " + localStorage.getItem("token")
                }
            });
            commit("DELETE_COMMANDE", id);
        },
        async update_commande({ commit }, data) {
            let response = await axios.post(`/commande/${data.id}`, data, {
                headers: {
                    "Content-Type": "multipart/form-data",
                    Authorization: "Bearer " + localStorage.getItem("token")
                }
            });

            commit("UPDATE_COMMANDE", response.data.data.data);
            console.log(data);
        }
    }
};
