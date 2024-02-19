import { createStore } from 'vuex';
import createPersistedState from "vuex-persistedstate";
import Bazzar from './bazzar';
import Auth from './auth';
import Dashboard from './dashboard';
import User from './user';
const store = createStore({
    modules: {
        Bazzar,
        Auth,
        Dashboard,
        User
    },
    plugins: [
        createPersistedState({
            storage: window.sessionStorage,
            key: 'bazzar',
            paths: ['Bazzar'],
        }),
    ],
})
export default store;