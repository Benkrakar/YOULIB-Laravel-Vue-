import axios from "axios";

export default {
    namespaced: true,
    state: {
        products: null,
        cart:[],
        cartCount: 0,

    },
    getters: {
      products(state){
          return state.products;
      },
      cart(state){
        return state.cart;
    }
    },
    mutations: {
        SET_PRODUCTS:(state, data)=>{
            console.log(data)
            state.products.unshift(data);
        },
        DELETE_PRODUCTS:(state,id)=>{
            state.products = state.products.filter(data => data.id !== id)
        },
        ADD_CART:(state,data)=>{
           
            // state.cart.push(data)
            let found = state.cart.find(product => product.id == data.id);

            if (found) {
                found.quantity ++;
                found.totalPrice = found.quantity * found.price;
            } else {
                state.cart.push(item);
        
                Vue.set(item, 'quantity', 1);
                Vue.set(item, 'totalPrice', item.price);
            }
            state.cartCount++;
            console.log(state.cartCount)
            
            // data = JSON.stringify(state.cart)   
            // window.localStorage.setItem('cart',data)
            // state.cart = state.products.filter(data => data.id !==id)
        },
         GET:()=>{
            window.localStorage.getItem('cart') 
            data = JSON.parse(window.localStorage.getItem('cart'))
        
         },
        UPDATE_PRODUCTS:(state,data)=>{
           state.products.forEach(n =>{
               if(n.id == data.id){
                n = data;
               }
           })
        },
        GET_PRODUCTS(state, data) {
            console.log(data.type)
            state.products = data;
        },
    },
    actions: {
        async get_products({ commit } ) {
            let response = await axios.get("/product",{headers:{
                Authorization: "Bearer " + localStorage.getItem("token")
                }});
            commit("GET_PRODUCTS", response.data.data);
        },
        async creat_products({ commit }, credentials) {
            let response = await axios.post("/product", credentials,{headers:{ "Content-Type": "multipart/form-data",Authorization: "Bearer " + localStorage.getItem("token")}});
                commit("SET_PRODUCTS", response.data.data);
                console.log( response.data.data)
        },
        async delete_products({ commit }, id) {
                await axios.delete(`/product/${id}`, {headers:{
                Authorization: "Bearer " + localStorage.getItem("token")
                }});
                commit("DELETE_PRODUCTS", id);
        },
        async update_products({ commit },data){
                let response = await axios.put(`/product/${data.id}`,data,{headers:{
                // "Content-Type": "multipart/form-data",
                Authorization: "Bearer " + localStorage.getItem("token")
                }});
              
                commit("UPDATE_PRODUCTS",response.data.data.data );
                console.log(data)
               
        },
             ADD_TO_CART({ commit },data){
            console.log(data)
             commit("ADD_CART", data)
        },
        GET({commit}){
            commit("GET")

        }
        
}

}

