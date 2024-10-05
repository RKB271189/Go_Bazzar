import { commonInitialState, commonGetters, commonMutations } from "../common";
function initialState() {
    return {
        ...commonInitialState,
        roles: [],
        role: {},
        permissionWithChecked: [],
    };
}
const getters = {
    ...commonGetters,
    roles: (state) => state.roles,
    role: (state) => state.role,
    permissionWithChecked: (state) => state.permissionWithChecked,
};
const actions = {
    async GET_ROLES({ commit }) {
        commit("RESET_RESPONSE_FLAG");
        try {
            let res = await axios.get("/api/roles");
            if (res.status === 200) {
                commit("SET_ROLES", res.data.roles);
            }
        } catch (error) {
            commit("SET_ERROR", error.response.data.error);
        }
    },
    async CREATE_ROLE({ commit }, params) {
        commit("RESET_RESPONSE_FLAG");
        try {
            let res = await axios.post("/api/roles", params);
            if (res.status === 200) {
                commit("SET_SUCCESS", res.data.message);
            }
        } catch (error) {
            commit("SET_ERROR", error.response.data.error);
        }
    },
    async EDIT_ROLE({ commit }, params) {
        commit("RESET_RESPONSE_FLAG");
        try {
            let res = await axios.get(`api/roles/${params}/edit`);
        } catch (error) {
            commit("SET_ERROR", error.response.data.error);
        }
    },
    async UPDATE_ROLE({ commit }, params) {
        commit("RESET_RESPONSE_FLAG");
        try {
            let res = await axios.put(`api/roles/${params.id}`);
        } catch (error) {
            commit("SET_ERROR", error.response.data.error);
        }
    },
    async GET_ROLE_PERMISSIONS({ commit }, params) {
        commit("RESET_RESPONSE_FLAG");
        try {
            let res = await axios.get(`/api/roles/${params}/permissions`);
            if (res.status === 200) {
                commit(
                    "SET_PERMISSION_WITH_CHECKED",
                    res.data.permission_with_checked
                );
            }
        } catch (error) {
            commit("SET_ERROR", error.response.data.error);
        }
    },
    async ASSIGN_ROLE_PERMISSIONS({ commit }, params) {
        commit("RESET_RESPONSE_FLAG");
        try {
            let res = await axios.post(`/api/roles/assign/permission`, params);
            if (res.status === 200) {
                commit("SET_SUCCESS", res.data.message);
            }
        } catch (error) {
            commit("SET_ERROR", error.response.data.error);
        }
    },
};
const mutations = {
    ...commonMutations,
    SET_ROLES(state, value) {
        state.roles = value;
    },
    SET_ROLE(state, value) {
        state.role = value;
    },
    SET_PERMISSION_WITH_CHECKED(state, value) {
        state.permissionWithChecked = value;
    },
};
export default {
    namespaced: true,
    state: initialState,
    getters,
    actions,
    mutations,
};
