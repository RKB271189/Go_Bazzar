import { commonInitialState, commonGetters, commonMutations } from "./common"
function initialState() {
    return {
        ...commonInitialState,
    }
}
const getters = {
    ...commonGetters,
}
const actions = {
    async USER_DAILY_ANALYSIS({ commit }, params) {
        commit('RESET_RESPONSE_FLAG')
        try {
            let res = await axios.get('/api/daily/analysis', params)
            if (res.status === 200) {
                commit('SET_SUCCESS', res.data.message)
            }
        } catch (error) {
            commit('SET_ERROR', error.response.data.error)
        }
    }
}
const mutations = {
    ...commonMutations,
}
export default {
    namespaced: true,
    state: initialState,
    getters,
    actions,
    mutations
}