import axios from "axios";
let cart= window.localStorage.getItem('cart') 
export default {
    namespaced: true,
    state: {
        cart: cart ? JSON.parse(cart) : [],
    },
    getters: {
        cart(state){
            return state.cart;
        },
    },
    mutations: {
        removeItem(state, item) {
          
            let index = state.cart.indexOf(item);
          
            state.cart.splice(index,1)
            window.localStorage.setItem('cart',JSON.stringify(state.cart));
        },
        GET_CART(state){
            let cart= window.localStorage.getItem('cart') 
            cart = JSON.parse(cart)
            state.cart = cart
        }
    },
}

