import { createStore } from 'vuex';
import Auth from './auth';
import Dashboard from './dashboard';
import User from './user';
const store = createStore({
    modules: {
        Auth,
        Dashboard,
        User
    }
})
export default store;