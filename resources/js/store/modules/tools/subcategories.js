import axios from "axios";

export default {
    namespaced: true,
    state: {
       subcategories: null,
       subcategorie: null,
    },
    getters: {
        subcategories(state){
         return state.subcategories;
      },
      subcategorie(state){
        return state.subcategorie;
     }
    },
    mutations: {
        SET_SUBCATEGORIES:(state, data)=>{
            console.log(data)
            state.subcategories.unshift(data);
        },
        DELETE_SUBCATEGORIES:(state,id)=>{
            state.subcategories = state.subcategories.filter(data => data.id !== id)
        },
        UPDATE_SUBCATEGORIES:(state,data)=>{
          
            state.subcategories.forEach(n =>{
                if(n.id == data.id){
                 n = data;
                }
            })
        },
        GET_SUBCATEGORIES(state, data) {
            state.subcategories = data;
            console.log(state.subcategories)
        },
        GET_SUBCATEGORIE(state, data) {
            state.subcategorie = data;
            console.log(state.subcategorie)
        },
    },
    actions: {
        async get_subcategories({ commit },credentials ) {
            let response = await axios.get("/categorie/products",credentials, {headers:{
                Authorization: "Bearer " + localStorage.getItem("token")
                }});
                console.log( response.data)
            commit("GET_SUBCATEGORIES", response.data);
        },
        async get_subcategorie({ commit } ) {
            let response = await axios.get("/subcategories", {headers:{
                Authorization: "Bearer " + localStorage.getItem("token")
                }});
                console.log( response.data.data)
            commit("GET_SUBCATEGORIE", response.data.data);
        },
        async creat_subcategorie({ commit }, credentials) {
            let response = await axios.post("/subcategories", credentials,{headers:{
                Authorization: "Bearer " + localStorage.getItem("token")
                }});
                commit("SET_SUBCATEGORIES", response.data.data);
        },
        async delete_subcategorie({ commit }, id) {
                await axios.delete(`/subcategories/${id}`, {headers:{
                Authorization: "Bearer " + localStorage.getItem("token")
                }});
                commit("DELETE_SUBCATEGORIES", id);
        },
        async update_subcategorie({ commit },data){
            let response = await axios.put(`/subcategories/${data.id}`,data,{headers:{
                Authorization: "Bearer " + localStorage.getItem("token")
            }});
            commit("UPDATE_SUBCATEGORIES",response.data.data);
        },
        
}
}

