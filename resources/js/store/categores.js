import axios from "axios";

export default {
    namespaced: true,
    state: {
       categories: null,
        name: null
    },
    getters: {
        categories(state){
         return state.categories;
      }
    },
    mutations: {
        SET_NAME:(state, data)=>{
            console.log(data)
            state.categories.unshift(data);
        },
        DELETE_CATEGORIE:(state,id)=>{
            state.categories = state.categories.filter(data => data.id !== id)
        },
        UPDATE_CATEGORIE:(state,data)=>{
            state.categories.unshift(data);
           
            // state.categories = state.categories.filter(data => data.id !== id)
        },
        GET_CATEGORIES(state, data) {
         
            state.categories = data;
         
          
        },
      
    },
    actions: {
        
        async get_categories({ commit }, credentials ) {
          
            let response = await axios.get("/categories", credentials);
            commit("GET_CATEGORIES", response.data.data);

        },
        async creat_categorie({ commit }, credentials) {
            let response = await axios.post("/categories", credentials,{headers:{
                Authorization: "Bearer " + localStorage.getItem("token")
                }});
                
                commit("SET_NAME", response.data.data);
        },
        async delete_categorie({ commit }, id) {
                await axios.delete(`/categories/${id}`, {headers:{
                Authorization: "Bearer " + localStorage.getItem("token")
                }});
                
                commit("DELETE_CATEGORIE", id);
        },
        async update_categorie({ commit },data){
            console.log(data.name)
          let response = await axios.put(`/categories/${data.id}`,{headers:{
                Authorization: "Bearer " + localStorage.getItem("token")
                }});
                // console.log(data.name)
                commit("UPDATE_CATEGORIE", data);
        },
        
}
}

