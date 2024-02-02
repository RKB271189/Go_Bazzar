import './bootstrap';

import Toast from 'vue-toastification'
import 'vue-toastification/dist/index.css'

import { createApp } from 'vue';

import App from '../../resources/js/views/App.vue';

import router from './router';
import store from './store';
import setupAxiosInterceptors from './services/axios-interceptor';
const app = createApp(App);
app.use(router);
app.use(store);
app.use(Toast);
router.beforeEach((to, from, next) => {    
    setupAxiosInterceptors(store);
    next();
});
app.mount('#app');