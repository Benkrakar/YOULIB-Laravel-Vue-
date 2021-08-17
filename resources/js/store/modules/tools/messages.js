import axios from "axios";
export default {
    namespaced: true,
    state: {
        messages: null
    },
    getters: {
        messages(state) {
            return state.messages;
        }
    },
    mutations: {
        SET_MESSAGE: (state, data) => {
            state.messages = data;
        },

        DELETE_MESSAGE: (state, id) => {
            state.messages = state.messages.filter(data => data.id !== id);
        },

        GET_MESSAGE(state, data) {
            state.messages = data;
        }
    },
    actions: {
        async get_messages({ commit }) {
            let response = await axios.get("/messages", {
                headers: {
                    Authorization: "Bearer " + localStorage.getItem("token")
                }
            });
            commit("GET_MESSAGE", response.data.data);
        },

        async creat_messages({ commit }, credentials) {
            let response = await axios.post("/messages", credentials, {
                headers: {
                    Authorization: "Bearer " + localStorage.getItem("token")
                }
            });
            commit("SET_MESSAGE", response.data.data);
        },

        async delete_messages({ commit }, id) {
            await axios.delete(`/messages/${id}`, {
                headers: {
                    Authorization: "Bearer " + localStorage.getItem("token")
                }
            });
            commit("DELETE_MESSAGE", id);
        }
    }
};
