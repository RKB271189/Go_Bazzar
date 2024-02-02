import { commonInitialState, commonGetters, commonMutations } from "./common"
function initialState() {
    return {
        ...commonInitialState,
        advertisements: {},
        advertisement: {}
    }
}
const getters = {
    ...commonGetters,
    advertisements: state => state.advertisements,
    advertisement: state => state.advertisement
}
const actions = {
    async FETCH_HOME_DETAILS({ commit }) {
        commit('RESET_RESPONSE_FLAG')
        try {
            let res = await axios.get('/api/home')
            if (res.status === 200) {
                commit('SET_ADVERTISEMENTS', res.data.advertisements)
            }
        } catch (error) {
            commit('SET_ERROR', error.response.data.error)
        }
    },
    async FETCH_ADVERTISEMENT_DETAILS({ commit }, params) {
        commit('RESET_RESPONSE_FLAG')
        try {
            let res = await axios.get('/api/fetch/advertise/' + params.id)
            if (res.status === 200) {
                commit('SET_ADVERTISEMENT', res.data.advertisement);
            }
        } catch (error) {
            commit('SET_ERROR', error.response.data.error)
        }
    }
}
const mutations = {
    ...commonMutations,
    SET_ADVERTISEMENTS(state, value) {
        state.advertisements = value;
    },
    SET_ADVERTISEMENT(state, value) {
        state.advertisement = value;
    }
}
export default {
    namespaced: true,
    state: initialState,
    getters,
    actions,
    mutations
}