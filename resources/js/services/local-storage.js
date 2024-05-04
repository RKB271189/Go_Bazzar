const accessLocalStorage = () => {
    const setLocalStorage = (key, value) => {
        const now = new Date();
        const timeInMiliSec = 3600 * 1000;
        const item = {
            value: value,
            expiry: now.getTime() + timeInMiliSec
        }
        localStorage.setItem(key, JSON.stringify(item));
    };
    const getLocalStorage = (key) => {
        const itemStr = localStorage.getItem(key);
        if (!itemStr) {
            return null;
        }
        const item = JSON.parse(itemStr);
        const now = new Date();
        if (now.getTime() > item.expiry) {
            localStorage.removeItem(key);
            return null;
        }
        return item.value;
    };
    const removeLocalStorage = (key) => {
        localStorage.removeItem(key);
    }
    const validateAuthorizationLocal = () => {
        const pToken = getLocalStorage("passport-token");
        return pToken ? true : false;
    }
    return {
        setLocalStorage,
        getLocalStorage,
        removeLocalStorage,
        validateAuthorizationLocal
    }
}
export default accessLocalStorage;