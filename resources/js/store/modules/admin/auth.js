import axios from "axios";

export default {
    namespaced: true,
    state: {
        token: null,
        user: null
    },
    getters: {
        authenticated(state){
            return state.token && state.user;
        },
        user(state){
            return state.user;
        }
    },
    mutations: {
        SET_TOKEN(state, token) {
            state.token = token;
            
            if (state) {
            localStorage.setItem('token', token)
            }
        },
        SET_USER(state, data) {
            state.user = data;
        }
    },
    actions: {
        async register({ dispatch }, credentials) {
            console.log(credentials)
            let response = await axios.post("/register", credentials,{headers:{ "Content-Type": "multipart/form-data"}});

            // console.log(response.data.data.token);
            dispatch("attempt", response.data.data.token);
        },
        async login({ dispatch }, credentials) {
            let response = await axios.post("/login", credentials);

            // console.log(response.data.data.token);
            dispatch("attempt", response.data.data.token);
        },
        async attempt({ commit,state }, token) {
            if (token) {
            commit("SET_TOKEN", token);
                
            }
            if (!state.token) {
                return
            }
            try {
                let response = await axios.get("/user", {
                    headers: {
                        Authorization: "Bearer " + token
                    },
                });
                commit("SET_USER", response.data);
            } catch (e) {
                commit("SET_USER", null);
                commit("SET_TOKEN", null);
            }
        },
        logout({commit}){
            return axios.get('/lougout').then(()=>{
                commit("SET_USER", null);
                commit("SET_TOKEN", null);
            });
        }
    }
};
