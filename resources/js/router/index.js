import { createRouter, createWebHistory } from "vue-router";
import Home from '../views/Home.vue';
import Advertisement from '../views/Advertise.vue';
import Directory from '../views/Directory.vue';
import Login from '../views/Login.vue';
import Signup from '../views/Signup.vue';
import Contact from '../views/Contact.vue';
import Service from '../views/Service.vue';
import Dashboard from '../views/Dashboard.vue';
import Profile from '../views/Profile.vue';
import Advertise from '../views/advertisement/List.vue';
import CreateAdvertise from '../views/advertisement/Create.vue';
import ViewAdvertise from '../views/advertisement/View.vue';
const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home,
    },
    {
        path: '/advertisement/:id',
        name: 'Advertisement',
        component: Advertisement,
    },
    {
        path: '/directory',
        name: 'Directory',
        component: Directory,
    },
    {
        path: '/service',
        name: 'Service',
        component: Service,
    },
    {
        path: '/contact',
        name: 'Contact',
        component: Contact,
    },
    {
        path: '/login',
        name: 'Login',
        component: Login,
    },
    {
        path: '/signup',
        name: 'Signup',
        component: Signup,
    },
    {
        path: '/dashboard',
        name: 'Dashboard',
        component: Dashboard,
    },
    {
        path: '/profile',
        name: 'Profile',
        component: Profile,
    },
    {
        path: '/advertise',
        name: 'Advertise',
        component: Advertise,
    },
    {
        path: '/create/advertise/:id',
        name: 'CreateAdvertise',
        component: CreateAdvertise,
    },
    {
        path: '/view/advertise/:id',
        name: 'ViewAdvertise',
        component: ViewAdvertise,
    }
];
const router = createRouter(
    {
        history: createWebHistory(),
        routes
    }
);
export default router;