import axios from "axios";

export default {
    namespaced: true,
    state: {
        categories: null,
        name: null
    },
    getters: {
        categories(state) {
            return state.categories;
        }
    },
    mutations: {
        SET_NAME: (state, data) => {
            console.log(data);
            state.categories.unshift(data);
        },
        DELETE_CATEGORIE: (state, id) => {
            state.categories = state.categories.filter(data => data.id !== id);
        },
        UPDATE_CATEGORIE: (state, data) => {
            state.categories.forEach(n => {
                if (n.id == data.id) {
                    n = data;
                }
            });
        },
        GET_CATEGORIES(state, data) {
            state.categories = data;
        }
    },
    actions: {
        async get_categories({ commit }) {
            let response = await axios.get("/categories", {
                headers: {
                    Authorization: "Bearer " + localStorage.getItem("token")
                }
            });
            commit("GET_CATEGORIES", response.data.data);
        },
        async creat_categorie({ commit }, credentials) {
            let response = await axios.post("/categories", credentials, {
                headers: {
                    Authorization: "Bearer " + localStorage.getItem("token")
                }
            });
            commit("SET_NAME", response.data.data);
        },
        async delete_categorie({ commit }, id) {
            await axios.delete(`/categories/${id}`, {
                headers: {
                    Authorization: "Bearer " + localStorage.getItem("token")
                }
            });
            commit("DELETE_CATEGORIE", id);
        },
        async update_categorie({ commit }, data) {
            let response = await axios.put(`/categories/${data.id}`, data, {
                headers: {
                    Authorization: "Bearer " + localStorage.getItem("token")
                }
            });
            commit("UPDATE_CATEGORIE", response.data.data);
        }
    }
};
