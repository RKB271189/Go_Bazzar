import { createRouter, createWebHistory } from "vue-router";
import Home from '../views/Home.vue';
import AdvertisementList from '../views/AdvertiseList.vue';
import Advertisement from '../views/Advertise.vue';
import ServiceList from '../views/Service.vue';
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
import ListingOther from '../views/others/List.vue';
import CreateService from '../views/others/CreateService.vue';
import CreateBusiness from '../views/others/CreateBusiness.vue';
const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home,
    },
    {
        path: '/advertisement/list',
        name: 'AdvertisementList',
        component: AdvertisementList,
    },
    {
        path: '/service/list',
        name: 'ServiceList',
        component: ServiceList,
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
    },
    {
        path: '/list/other',
        name: 'ListingOther',
        component: ListingOther,
    },
    {
        path: '/create/service/:id',
        name: 'CreateService',
        component: CreateService,
    },
    {
        path: '/create/business/:id',
        name: 'CreateBusiness',
        component: CreateBusiness,
    }
];
const router = createRouter(
    {
        history: createWebHistory(),
        routes
    }
);
export default router;