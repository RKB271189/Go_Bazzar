import router from "../router";
import accessLocalStorage from "./local-storage";
const setupAxiosInterceptors = (store) => {
    axios.interceptors.request.use(
        (config) => {
            let passportToken = store.state.Auth.passportToken;
            if (passportToken) {
            } else {
                const { getLocalStorage } = accessLocalStorage();
                passportToken = getLocalStorage('passport-token');
            }
            config.headers.Authorization = `Bearer ${passportToken}`;
            return config;
        },
        (error) => {
            return Promise.reject(error);
        }
    );
    axios.interceptors.response.use(
        (response) => {
            return response;
        },
        (error) => {
            console.log(error.response.status);
            if (error.response.status === 401) {
                router.push('/login');
            } else if (error.response.status === 403) {
                router.push('/request-error');
            }
            return Promise.reject(error);
        }
    );
}

export default setupAxiosInterceptors;