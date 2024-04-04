<template>
  <Loader v-if="loading"></Loader>
  <Toast :showToast="showToast" :message="message" :hasError="hasError"></Toast>
  <section class="bg-light py-3 py-md-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-5">
          <div class="card border border-light-subtle rounded-3 shadow-sm">
            <div class="card-body p-3 p-md-4 p-xl-5">
              <div class="text-center mb-3">
                <a href="#!">
                  <img
                    :src="'/images/go-bazar-logo.webp'"
                    alt="BootstrapBrain Logo"
                    width="175"
                    height="57"
                  />
                </a>
              </div>
              <h2 class="fs-6 fw-normal text-center text-secondary mb-4">
                Enter Email Address
              </h2>
              <div class="row gy-2 overflow-hidden">
                <div class="col-9">
                  <div class="form-floating mb-3">
                    <input
                      v-model="email"
                      type="email"
                      class="form-control"
                      name="email"
                      id="email"
                      required
                    />
                    <label for="email" class="form-label">Email</label>
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-floating mb-3">
                    <div class="d-grid my-1">
                      <button
                        @click="userSendCode"
                        class="btn btn-success btn-lg"
                        type="button"
                      >
                        Send
                      </button>
                    </div>
                  </div>
                </div>
                <div class="col-12" v-if="codeSent">
                  <div class="form-floating mb-3">
                    <input
                      v-model="code"
                      type="text"
                      class="form-control"
                      name="code"
                      id="code"
                      autocomplete="off"
                      required
                    />
                    <label for="code" class="form-label"
                      >Enter 5 digit code received in your email</label
                    >
                  </div>
                </div>
                <div class="col-12" v-if="codeSent">
                  <div class="form-floating mb-3">
                    <input
                      v-model="password"
                      type="text"
                      class="form-control"
                      name="password"
                      id="password"
                      autocomplete="off"
                      required
                    />
                    <label for="password" class="form-label"
                      >Enter new password</label
                    >
                  </div>
                </div>
                <div class="col-12" v-if="codeSent">
                  <div class="form-floating mb-3">
                    <input
                      v-model="confirmPassword"
                      type="text"
                      class="form-control"
                      name="confirmPassword"
                      id="confirmPassword"
                      autocomplete="off"
                      required
                    />
                    <label for="confirmPassword" class="form-label"
                      >Confirm your password</label
                    >
                  </div>
                </div>
                <div class="col-12" v-if="codeSent">
                  <div class="d-grid my-3">
                    <button
                      class="btn btn-primary btn-lg"
                      type="button"
                      @click="userChangePassword"
                    >
                      Change Password
                    </button>
                  </div>
                </div>
                <div class="col-12">
                  <div class="row">
                    <div class="col-md-5">
                      <hr />
                    </div>
                    <div class="col-md-2">OR</div>
                    <div class="col-md-5">
                      <hr />
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <p class="m-0 text-secondary text-center">
                    Go to
                    <router-link
                      class="link-primary text-decoration-none"
                      to="/login"
                      >Login</router-link
                    >
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
  
  <script>
import { ref } from "vue";
import { useRouter } from "vue-router";
import Loader from "../components/Loader.vue";
import Toast from "../components/Toast.vue";
import useAPIRequest from "../services/api-request";
export default {
  components: {
    Loader,
    Toast,
  },
  setup() {
    const router = useRouter();
    const { hasError, message, loading, showToast, handleAPIRequest } =
      useAPIRequest();
    const email = ref("");
    const code = ref("");
    const password = ref("");
    const confirmPassword = ref("");
    const codeSent = ref(false);
    const userSendCode = async () => {
      let params = {
        email: email.value,
        forgot: 1,
      };
      await handleAPIRequest("Auth", "Auth/USER_SEND_CODE", params);
      if (!hasError.value) {
        codeSent.value = true;
      }
    };
    const userChangePassword = async () => {
      let params = {
        email: email.value,
        code: code.value,
        password: password.value,
        confirmPassword: confirmPassword.value,
      };
      await handleAPIRequest("Auth", "Auth/USER_CHANGE_PASSWORD", params);
      if (!hasError.value) {
        router.push("/login");
      }
    };
    return {
      loading,
      showToast,
      message,
      hasError,
      email,
      codeSent,
      code,
      password,
      confirmPassword,
      userSendCode,
      userChangePassword,
    };
  },
};
</script>
  
  <style>
</style>