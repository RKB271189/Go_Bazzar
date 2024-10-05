import { createStore } from 'vuex';
import createPersistedState from "vuex-persistedstate";
import Bazzar from './bazzar';
import Auth from './auth';
import Dashboard from './dashboard';
import User from './user';

/** Admin modules */
import Roles from './admin/roles';
import Permissions from './admin/permission';
const store = createStore({
    modules: {
        Bazzar,
        Auth,
        Dashboard,
        User,
        Roles,
        Permissions
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