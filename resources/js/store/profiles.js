import axios from "axios";

export default {
    namespaced: true,
    state: {
        profiles: null,
        // editproduct:null

    },
    getters: {
      profiles(state){
          return state.profiles;
      }
    },
    mutations: {
        SET_PROFILES:(state, data)=>{
            console.log(data)
            state.profiles.unshift(data);
        },
        DELETE_PROFILES:(state,id)=>{
            state.profiles = state.profiles.filter(data => data.id !== id)
        },
        UPDATE_PROFILES:(state,data)=>{
           state.profiles.forEach(n =>{
               if(n.id == data.id){
                n = data;
               }
           })
        },
        GET_PROFILES(state, data) {
            console.log(data)
            state.profiles = data;
        },
    },
    actions: {
        async get_profiles({ commit } ) {
            let response = await axios.get("/users",{
                params: {
                  _limit: 1
                 }
              });
            commit("GET_PROFILES", response.data.data);
        },
        async creat_profiles({ commit }, credentials) {
            let response = await axios.post("/register", credentials,{headers:{ "Content-Type": "multipart/form-data"}});
                commit("SET_PRODUCTS", response.data.data);
                console.log( response.data.data)
        },
        async delete_profiles({ commit }, id) {
                await axios.delete(`/users/${id}`, {headers:{
                Authorization: "Bearer " + localStorage.getItem("token")
                }});
                commit("DELETE_PROFILES", id);
        },
        async update_profiles({ commit },data){
                let response = await axios.put(`/users/${data.id}`,{headers:{
                Authorization: "Bearer " + localStorage.getItem("token")
                }});
              
                commit("UPDATE_PROFILES",data );
                console.log(data)
               
        },
}
}

