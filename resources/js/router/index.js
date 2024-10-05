import { createRouter, createWebHistory } from "vue-router";
import Home from '../views/Home.vue';
import AdvertisementList from '../views/AdvertiseList.vue';
import Advertisement from '../views/Advertise.vue';
import ServiceList from '../views/Service.vue';
import BusinessList from '../views/Directory.vue';
import OtherList from '../views/Other.vue';
import NewsPaperList from '../views/NewsPaper.vue';
import Directory from '../views/Directory.vue';
import Login from '../views/Login.vue';
import Signup from '../views/Signup.vue';
import Forgot from '../views/Forgot.vue';
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
import ForbiddenError from '../views/403.vue';
/** this are Admin Routes */
import Roles from '../views/admin/Roles.vue';
import AdminDashboard from '../views/admin/Dashboard.vue';
import AdminAdvertise from '../views/admin/Advertise.vue';

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home,
    },
    {
        path: '/advertisement/list/:slug?',
        name: 'AdvertisementList',
        component: AdvertisementList,
    },
    {
        path: '/advertisement/:id',
        name: 'Advertisement',
        component: Advertisement,
    },
    {
        path: '/service/list/:slug?',
        name: 'ServiceList',
        component: ServiceList,
    },
    {
        path: '/business/list/:slug?',
        name: 'BusinessList',
        component: BusinessList,
    },
    {
        path: '/other/list/:slug?',
        name: 'OtherList',
        component: OtherList,
    },
    {
        path: '/newspaper/list/:slug?',
        name: 'NewsPaperList',
        component: NewsPaperList,
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
        path: '/login/:slug?',
        name: 'Login',
        component: Login,
    },
    {
        path: '/signup',
        name: 'Signup',
        component: Signup,
    },
    {
        path: '/forgot-password',
        name: 'Forgot',
        component: Forgot,
    },
    {
        path: '/dashboard',
        name: 'Dashboard',
        component: Dashboard,
        meta: { requiresServerValidation: true }
    },
    {
        path: '/profile',
        name: 'Profile',
        component: Profile,
        meta: { requiresServerValidation: true }
    },
    {
        path: '/advertise',
        name: 'Advertise',
        component: Advertise,
        meta: { requiresServerValidation: true }
    },
    {
        path: '/create/advertise/:id',
        name: 'CreateAdvertise',
        component: CreateAdvertise,
        meta: { requiresServerValidation: true }
    },
    {
        path: '/view/advertise/:id',
        name: 'ViewAdvertise',
        component: ViewAdvertise,
        meta: { requiresServerValidation: true }
    },
    {
        path: '/list/other',
        name: 'ListingOther',
        component: ListingOther,
        meta: { requiresServerValidation: true }
    },
    {
        path: '/create/service/:id',
        name: 'CreateService',
        component: CreateService,
        meta: { requiresServerValidation: true }
    },
    {
        path: '/create/business/:id',
        name: 'CreateBusiness',
        component: CreateBusiness,
        meta: { requiresServerValidation: true }
    },
    {
        path: '/request-error',
        name: 'ForbiddenError',
        component: ForbiddenError,
    },
    /** All admin paths here */
    {
        path: '/admin/roles',
        name: 'Roles',
        component: Roles
    },
    {
        path: '/admin/dashboard',
        name: 'AdminDashboard',
        component: AdminDashboard
    },
    {
        path: '/admin/advertise',
        name: 'AdminAdvertise',
        component: AdminAdvertise
    }
];
const router = createRouter(
    {
        history: createWebHistory(),
        routes
    }
);
// router.beforeEach(async (to, from, next) => {
//     if (to.meta.requiresServerValidation) {
//         const { getLocalStorage } = accessLocalStorage();
//         const passport_token = getLocalStorage('passport-token');
//         await setupAxiosInterceptors(passport_token);
//         const { handleAPIRequest, hasError } =
//             useAPIRequest();
//         await handleAPIRequest("User", "User/USER_FETCH_PROFILE");
//         if (hasError.value) {
//             router.push('/login');
//         } else {
//             next();
//         }
//     } else {
//         next();
//     }
// });
export default router;