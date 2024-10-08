import { commonInitialState, commonGetters, commonMutations } from "./common"
function initialState() {
    return {
        ...commonInitialState,
        passportToken: null,
        redirectURL: null
    }
}
const getters = {
    ...commonGetters,
    passportToken: state => state.passportToken,
    redirectURL: state => state.redirectURL
}
const actions = {
    async USER_SEND_CODE({ commit }, params) {
        commit('RESET_RESPONSE_FLAG')
        try {
            let res = await axios.post('/api/send/code', params)
            if (res.status === 200) {
                commit('SET_SUCCESS', res.data.message)
            }
        } catch (error) {
            commit('SET_ERROR', error.response.data.error)
        }
    },
    async USER_CREATE_aCCOUNT({ commit }, params) {
        commit('RESET_RESPONSE_FLAG')
        try {
            let res = await axios.post('/api/create/account', params)
            if (res.status === 200) {
                commit('SET_SUCCESS', res.data.message)
            }
        } catch (error) {
            commit('SET_ERROR', error.response.data.error)
        }
    },
    async USER_VERIFY_CREDENTIALS({ commit }, params) {
        commit('RESET_RESPONSE_FLAG')
        try {
            let res = await axios.post('/api/verify/account', params)
            if (res.status === 200) {
                commit('SET_PASSPORT_TOKEN', res.data.token)
                commit('SET_REDIRECT_URL', res.data.url)
                commit('SET_SUCCESS', res.data.message)
            }
        } catch (error) {
            commit('SET_ERROR', error.response.data.error)
        }
    },
    async USER_CHANGE_PASSWORD({ commit }, params) {
        commit('RESET_RESPONSE_FLAG')
        try {
            let res = await axios.post('/api/change/password', params)
            if (res.status === 200) {
                commit('SET_SUCCESS', res.data.message)
            }
        } catch (error) {
            commit('SET_ERROR', error.response.data.error)
        }
    },
    async USER_LOGOUT({ commit }, params) {
        commit('RESET_RESPONSE_FLAG')
        try {
            let res = await axios.post('/api/logout', params)
            if (res.status === 200) {
                commit('SET_PASSPORT_TOKEN', '');
                commit('SET_SUCCESS', res.data.message);
            }
        } catch (error) {
            commit('SET_ERROR', error.response.data.error)
        }
    },

}
const mutations = {
    ...commonMutations,
    SET_PASSPORT_TOKEN(state, value) {
        state.passportToken = value
    },
    SET_REDIRECT_URL(state, value) {
        state.redirectURL = value
    }
}
export default {
    namespaced: true,
    state: initialState,
    getters,
    actions,
    mutations
}