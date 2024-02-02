export const commonInitialState = {
    hasError: false,
    message: null,
    status: null
}
export const commonGetters = {
    hasError: state => state.hasError,
    message: state => state.message,
    status: state => state.status
};
export const commonMutations = {
    RESET_RESPONSE_FLAG(state) {
        state.hasError = false;
        state.message = null;
    },
    SET_ERROR(state, value) {
        state.hasError = true;
        state.message = value;
    },
    SET_SUCCESS(state, value) {
        state.hasError = false;
        state.message = value;
    },
    SET_STATUS(state, value) {
        state.status = value;
    }
};
