import { commonInitialState, commonGetters, commonMutations } from "./common"
function initialState() {
    return {
        ...commonInitialState,
        province: [],
        city: [],
        profile: [],
        advertisements: {},
        advertisement: {},
        rooms_category: [],
        estates_category: [],
        sub_categories: [],
        sub_sub_categories: [],
        services: {},
        service: {},
        businesses: {},
        business: {}
    }
}
const getters = {
    ...commonGetters,
    province: state => state.province,
    city: state => state.city,
    profile: state => state.profile,
    advertisements: state => state.advertisements,
    advertisement: state => state.advertisement,
    rooms_category: state => state.rooms_category,
    estates_category: state => state.estates_category,
    sub_categories: state => state.sub_categories,
    sub_sub_categories: state => state.sub_sub_categories,
    services: state => state.services,
    service: state => state.service,
    businesses: state => state.businesses,
    business: state => state.business,
}
const actions = {    
    async USER_FETCH_PROFILE({ commit }) {
        commit('RESET_RESPONSE_FLAG')
        try {
            let res = await axios.get('/api/fetch/profile')
            if (res.status === 200) {
                commit('SET_PROVINCE', res.data.province);
                commit('SET_PROFILE', res.data.profile);
            }
        } catch (error) {
            commit('SET_ERROR', error.response.data.error)
        }
    },
    async USER_CREATE_PROFILE({ commit }, params) {
        commit('RESET_RESPONSE_FLAG')
        try {
            let res = await axios.post('/api/create/profile', params)
            if (res.status === 200) {
                commit('SET_SUCCESS', res.data.message);
                commit('SET_PROFILE', res.data.profile);
            }
        } catch (error) {
            commit('SET_ERROR', error.response.data.error)
        }
    },
    async USER_FETCH_ADVERTISEMENTS({ commit }) {
        commit('RESET_RESPONSE_FLAG')
        try {
            let res = await axios.get('/api/fetch/advertise');
            if (res.status === 200) {
                commit('SET_PROVINCE', res.data.province);
                commit('SET_SUB_CATEGORIES', res.data.ad_categories);
                commit('SET_ADVERTISEMENTS', res.data.advertisement);
            }
        } catch (error) {
            commit('SET_STATUS', error.response.status);
            commit('SET_ERROR', error.response.data.error)
        }
    },
    async USER_FETCH_ADVERTISEMENT({ commit }, params) {
        commit('RESET_RESPONSE_FLAG')
        try {
            let res = await axios.get('/api/fetch/advertise/' + params.id);
            if (res.status === 200) {
                commit('SET_PROVINCE', res.data.province);
                commit('SET_SUB_CATEGORIES', res.data.ad_categories);
                commit('SET_ADVERTISEMENT', res.data.advertisement);
                commit('SET_ROOMS_CATEGORIES', res.data.rooms);
                commit('SET_ESTATES_CATEGORIES', res.data.estate);
            }
        } catch (error) {
            commit('SET_STATUS', error.response.status);
            commit('SET_ERROR', error.response.data.error)
        }
    },
    async USER_CREATE_ADVERTISEMENT({ commit }, params) {
        commit('RESET_RESPONSE_FLAG')
        try {
            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }
            let res = await axios.post('/api/create/advertise', params, config)
            if (res.status === 200) {
                commit('SET_SUCCESS', res.data.message);
                commit('SET_ADVERTISEMENT', res.data.advertisement);
            }
        } catch (error) {
            commit('SET_ERROR', error.response.data.error)
        }
    },
    async USER_UPLOAD_ADVERTISE_IMAGES({ commit }, params) {
        commit('RESET_RESPONSE_FLAG')
        try {
            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }
            let res = await axios.post('/api/upload/advertise/image', params, config)
            if (res.status === 200) {
                commit('SET_SUCCESS', res.data.message);
            }
        } catch (error) {
            commit('SET_ERROR', error.response.data.error)
        }
    },
    async USER_FETCH_SERVICE({ commit }, params) {
        commit('RESET_RESPONSE_FLAG')
        try {
            let res = await axios.get('/api/fetch/service/' + params.id);
            if (res.status === 200) {
                commit('SET_PROVINCE', res.data.province);
                commit('SET_SUB_CATEGORIES', res.data.service_categories);
                commit('SET_SERVICE', res.data.service);
            }
        } catch (error) {
            commit('SET_STATUS', error.response.status);
            commit('SET_ERROR', error.response.data.error)
        }
    },
    async USER_FETCH_OTHERS({ commit }) {
        commit('RESET_RESPONSE_FLAG')
        try {
            let res = await axios.get('/api/fetch/others');
            if (res.status === 200) {
                commit('SET_PROVINCE', res.data.province);
                commit('SET_SUB_CATEGORIES', res.data.ad_categories);
                commit('SET_SERVICES', res.data.service);
                commit('SET_BUSINESSES', res.data.business);
            }
        } catch (error) {
            commit('SET_STATUS', error.response.status);
            commit('SET_ERROR', error.response.data.error)
        }
    },
    async USER_CREATE_SERVICE({ commit }, params) {
        commit('RESET_RESPONSE_FLAG')
        try {
            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }
            let res = await axios.post('/api/create/service', params, config)
            if (res.status === 200) {
                commit('SET_SUCCESS', res.data.message);
                commit('SET_SERVICE', res.data.service);
            }
        } catch (error) {
            commit('SET_ERROR', error.response.data.error)
        }
    },
    async USER_FETCH_BUSINESS({ commit }, params) {
        commit('RESET_RESPONSE_FLAG')
        try {
            let res = await axios.get('/api/fetch/business/' + params.id);
            if (res.status === 200) {
                commit('SET_PROVINCE', res.data.province);
                commit('SET_SUB_CATEGORIES', res.data.business_categories);
                commit('SET_SUB_SUB_CATEGORIES', res.data.business_sub_categories);
                commit('SET_SERVICE', res.data.service);
            }
        } catch (error) {
            commit('SET_STATUS', error.response.status);
            commit('SET_ERROR', error.response.data.error)
        }
    },
    async USER_CREATE_BUSINESS({ commit }, params) {
        commit('RESET_RESPONSE_FLAG')
        try {
            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }
            let res = await axios.post('/api/create/business', params, config)
            if (res.status === 200) {
                commit('SET_SUCCESS', res.data.message);
                commit('SET_SERVICE', res.data.business);
            }
        } catch (error) {
            commit('SET_ERROR', error.response.data.error)
        }
    },
}
const mutations = {
    ...commonMutations,
    SET_PROVINCE(state, value) {
        state.province = value;
    },
    SET_CITY(state, value) {
        state.city = value;
    },
    SET_PROFILE(state, value) {
        state.profile = value;
    },
    SET_ADVERTISEMENTS(state, value) {
        state.advertisements = value;
    },
    SET_ADVERTISEMENT(state, value) {
        state.advertisement = value;
    },
    SET_ROOMS_CATEGORIES(state, value) {
        state.rooms_category = value;
    },
    SET_ESTATES_CATEGORIES(state, value) {
        state.estates_category = value
    },
    SET_SUB_CATEGORIES(state, value) {
        state.sub_categories = value;
    },
    SET_SERVICE(state, value) {
        state.service = value;
    },
    SET_BUSINESS(state, value) {
        state.business = value;
    },
    SET_BUSINESSES(state, value) {
        state.businesses = value;
    },
    SET_SERVICES(state, value) {
        state.services = value;
    },
    SET_SUB_SUB_CATEGORIES(state, value) {
        state.sub_sub_categories = value;
    }
}
export default {
    namespaced: true,
    state: initialState,
    getters,
    actions,
    mutations
}