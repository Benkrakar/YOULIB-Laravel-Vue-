import axios from "axios";

export default {
    namespaced: true,
    state: {
        products: null,
        editproduct:null

    },
    getters: {
      products(state){
          return state.products;
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
            let response = await axios.get("/product");
            commit("GET_PRODUCTS", response.data.data);
        },
        async creat_products({ commit }, credentials) {
            let response = await axios.post("/product", credentials,{headers:{ "Content-Type": "multipart/form-data"}});
                commit("SET_PRODUCTS", response.data.data);
                console.log( response.data.data)
        },
        async delete_products({ commit }, id) {
                await axios.delete(`/product/${id}`, {headers:{
                Authorization: "Bearer " + localStorage.getItem("token")
                }});
                commit("DELETE_PRODUCTS", id);
        },
        async update_products({ commit },credentials){
                let response = await axios.post(`/produc`,credentials,{headers:{
                "Content-Type": "multipart/form-data",
                // Authorization: "Bearer " + localStorage.getItem("token")
                }});
              
                commit("UPDATE_PRODUCTS",response.data.data.data );
                console.log(data)
               
        },
}
}

