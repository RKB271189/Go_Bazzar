import { createStore } from 'vuex';
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
    }
})
export default store;