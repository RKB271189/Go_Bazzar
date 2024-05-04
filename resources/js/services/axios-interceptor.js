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
            if (error.response.status === 401) {
                router.push('/login');
            }
            return Promise.reject(error);
        }
    );
}

export default setupAxiosInterceptors;