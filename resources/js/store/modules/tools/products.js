import axios from "axios";
let cart = window.localStorage.getItem("cart");

export default {
    namespaced: true,
    state: {
        products: null,
        related_products: null,
        paginated_products: null,
        cart: cart ? JSON.parse(cart) : [],
        cartCount: 0
    },
    getters: {
        products(state) {
            return state.products;
        },
        related_products(state) {
            return state.related_products;
        },
        paginated_products(state) {
            return state.paginated_products;
        },
        cartCount(state) {
            return state.cartCount;
        }
    },
    mutations: {
        ADD_TO_CART: (state, item) => {
            const found = state.cart.find(product => product.id == item.id);
            if (found) {
                found.quantity = item.quantity;
            } else {
                item.quantity = 1;
                state.cart.push(item);
                state.cartCount++;
            }

            window.localStorage.setItem("cart", JSON.stringify(state.cart));
        },

        SET_PRODUCTS: (state, data) => {
            state.products.data.unshift(data);
        },
        DELETE_PRODUCTS: (state, id) => {
            state.products.data = state.products.data.filter(
                data => data.id !== id
            );
        },
        UPDATE_PRODUCTS: (state, data) => {
            state.products.data.forEach(n => {
                if (n.id == data.id) {
                    n = data;
                }
            });
        },
        GET_PRODUCTS(state, data) {
            state.products = data;
        },
        GET_PRODUCT(state, data) {
            state.products = data;
        },
        GET_RELATED_PRODUCT(state, data) {
            state.related_products = data;
        },
        GET_PRODUCTS_PAGINATED(state, data) {
            state.paginated_products = data;
        }
    },
    actions: {
        async get_products({ commit }) {
            let response = await axios.get("/product", {
                headers: {
                    Authorization: "Bearer " + localStorage.getItem("token")
                }
            });
            commit("GET_PRODUCTS", response.data.data);
        },
        async get_product({ commit }, id) {
            let response = await axios.get(`/product/${id}`, {
                headers: {
                    Authorization: "Bearer " + localStorage.getItem("token")
                }
            });
            commit("GET_PRODUCT", response.data.data);
        },
        async delete_products({ commit }, id) {
            await axios.delete(`/product/${id}`, {
                headers: {
                    Authorization: "Bearer " + localStorage.getItem("token")
                }
            });
            commit("DELETE_PRODUCTS", id);
        },
        async get_product_paginated({ commit }, page) {
            console.log(page);
            let response = await axios.get("/productpaginated?page=" + page, {
                headers: {
                    Authorization: "Bearer " + localStorage.getItem("token")
                }
            });
            commit("GET_PRODUCTS_PAGINATED", response.data.data);
        },
        async get_product_paginated_dash({ commit }, page) {
            console.log(page);
            let response = await axios.get("/productpaginateds?page=" + page, {
                headers: {
                    Authorization: "Bearer " + localStorage.getItem("token")
                }
            });
            commit("GET_PRODUCTS", response.data.data);
        },
        async get_product_subcategorie({ commit }, id) {
            let response = await axios.get(`/product/subcategorie/${id}`, {
                headers: {
                    Authorization: "Bearer " + localStorage.getItem("token")
                }
            });
            commit("GET_PRODUCT", response.data.data);
        },
        async get_related_product({ commit }, id) {
            let response = await axios.get(`/product/subcategorie/${id}`, {
                headers: {
                    Authorization: "Bearer " + localStorage.getItem("token")
                }
            });
            console.log("qsefddddddddd");
            commit("GET_RELATED_PRODUCT", response.data.data);
        },
        async creat_products({ commit }, credentials) {
            let response = await axios.post("/product", credentials, {
                headers: {
                    "Content-Type": "multipart/form-data",
                    Authorization: "Bearer " + localStorage.getItem("token")
                }
            });
            commit("SET_PRODUCTS", response.data.data);
        },

        async update_products({ commit }, data) {
            let response = await axios.post(`/product/${data.id}`, data, {
                headers: {
                    "Content-Type": "multipart/form-data",
                    Authorization: "Bearer " + localStorage.getItem("token")
                }
            });

            commit("UPDATE_PRODUCTS", response.data.data);
        },
        async update_qttproducts({ commit }, data) {
            let response = await axios.post(`/qqproduct/${data.id}`, data);

            commit("UPDATE_PRODUCTS", response.data.data);
        }
    }
};
