import { commonInitialState, commonGetters, commonMutations } from "./common"
function initialState() {
    return {
        ...commonInitialState,
        subcategories: {},
        subsubcategories: {},
        quickadvertisements: {},
        advertisements: {},
        advertisement: {},
        services: {},
        businesses: {},
        newspapers: {},
        others: {}
    }
}
const getters = {
    ...commonGetters,
    subcategories: state => state.subcategories,
    subsubcategories: state => state.subsubcategories,
    quickadvertisements: state => state.quickadvertisements,
    advertisements: state => state.advertisements,
    advertisement: state => state.advertisement,
    services: state => state.services,
    businesses: state => state.businesses,
    newspapers: state => state.newspapers,
    others: state => state.others
}
const actions = {
    async FETCH_MENU_ITEMS({ commit }) {
        commit('RESET_RESPONSE_FLAG')
        try {
            let res = await axios.get('/api/menu')
            if (res.status === 200) {
                commit('SET_SUB_CATEGORIES', res.data.subcategories);
            }
        } catch (error) {
            commit('SET_ERROR', error.response.data.error)
        }
    },
    async FETCH_HOME_DETAILS({ commit }) {
        commit('RESET_RESPONSE_FLAG')
        try {
            let res = await axios.get('/api/home')
            if (res.status === 200) {
                commit('SET_ADVERTISEMENTS', res.data.advertisements);
                commit('SET_SERVICES', res.data.services);
                commit('SET_BUSINESSES', res.data.businesses);
                commit('SET_QUICK_ADVERTISEMENTS', res.data.quickadvertisements);
            }
        } catch (error) {
            commit('SET_ERROR', error.response.data.error)
        }
    },
    async FETCH_ADVERTISE_DETAILS({ commit }) {
        commit('RESET_RESPONSE_FLAG')
        try {
            let res = await axios.get('/api/advertise')
            if (res.status === 200) {
                commit('SET_ADVERTISEMENTS', res.data.advertisements);
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
    },
    async FETCH_SERVICE_DETAILS({ commit }) {
        commit('RESET_RESPONSE_FLAG')
        try {
            let res = await axios.get('/api/service')
            if (res.status === 200) {
                commit('SET_SERVICES', res.data.services);
            }
        } catch (error) {
            commit('SET_ERROR', error.response.data.error)
        }
    },
    async FETCH_BUSINESS_DETAILS({ commit }) {
        commit('RESET_RESPONSE_FLAG')
        try {
            let res = await axios.get('/api/business')
            if (res.status === 200) {
                commit('SET_BUSINESSES', res.data.businesses);
            }
        } catch (error) {
            commit('SET_ERROR', error.response.data.error)
        }
    },
}
const mutations = {
    ...commonMutations,
    SET_SUB_CATEGORIES(state, value) {
        state.subcategories = value;
    },
    SET_SUB_SUB_CATEGORIES(state, value) {
        state.subsubcategories = value;
    },
    SET_QUICK_ADVERTISEMENTS(state, value) {
        state.quickadvertisements = value;
    },
    SET_ADVERTISEMENTS(state, value) {
        state.advertisements = value;
    },
    SET_ADVERTISEMENT(state, value) {
        state.advertisement = value;
    },
    SET_SERVICES(state, value) {
        state.services = value;
    },
    SET_BUSINESSES(state, value) {
        state.businesses = value;
    },
    SET_NEWSPAPERS(state, value) {
        state.newspapers = value;
    },
    SET_OTHERS(state, value) {
        state.others = value;
    }
}
export default {
    namespaced: true,
    state: initialState,
    getters,
    actions,
    mutations
}