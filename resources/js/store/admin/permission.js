import { commonInitialState, commonGetters, commonMutations } from "../common";
function initialState() {
    return {
        ...commonInitialState,
        permissions: [],
        permission: {},
    };
}
const getters = {
    ...commonGetters,
    permissions: (state) => state.permissions,
    permission: (state) => state.permission,
};
const actions = {
    async GET_PERMISSIONS({ commit }) {
        commit("RESET_RESPONSE_FLAG");
        try {
            let res = await axios.get("/api/permissions");
            if (res.status === 200) {
                commit("SET_PERMISSIONS", res.data.permissions);
            }
        } catch (error) {
            commit("SET_ERROR", error.response.data.error);
        }
    },
    async CREATE_PERMISSION({ commit }, params) {
        commit("RESET_RESPONSE_FLAG");
        try {
            let res = await axios.post("/api/permissions", params);
            if (res.status === 200) {
                commit("SET_SUCCESS", res.data.message);
            }
        } catch (error) {
            commit("SET_ERROR", error.response.data.error);
        }
    },
    async EDIT_PERMISSION({ commit }, params) {
        commit("RESET_RESPONSE_FLAG");
        try {
            let res = await axios.get(`api/permissions/${params}/edit`);
        } catch (error) {
            commit("SET_ERROR", error.response.data.error);
        }
    },
    async UPDATE_PERMISSION({ commit }, params) {
        commit("RESET_RESPONSE_FLAG");
        try {
            let res = await axios.put(`api/permissions/${params.id}`);
        } catch (error) {
            commit("SET_ERROR", error.response.data.error);
        }
    },  
};
const mutations = {
    ...commonMutations,
    SET_PERMISSIONS(state, value) {
        state.permissions = value;
    },
    SET_PERMISSION(state, value) {
        state.permission = value;
    },
};
export default {
    namespaced: true,
    state: initialState,
    getters,
    actions,
    mutations,
};
