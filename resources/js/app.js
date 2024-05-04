import './bootstrap';

import Toast from 'vue-toastification'
import 'vue-toastification/dist/index.css'

import { createApp } from 'vue';

import App from '../../resources/js/views/App.vue';

import store from './store';
import router from './router';
import setupAxiosInterceptors from './services/axios-interceptor';
import accessLocalStorage from './services/local-storage';

const app = createApp(App);
app.use(store);
app.use(router);
app.use(Toast);
router.beforeEach((to, from, next) => {
    setupAxiosInterceptors(store);
    const { validateAuthorizationLocal } = accessLocalStorage();
    if (to.meta.requiresServerValidation) {
        if (validateAuthorizationLocal()) {
            next();
        } else {
            router.push(`/login/${"unauthorized"}`);
        }
    } else {
        next();
    }
});
app.mount('#app');