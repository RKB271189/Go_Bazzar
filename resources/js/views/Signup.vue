<template>
  <Toast :showToast="showToast" :message="message" :hasError="hasError"></Toast>
  <Loader v-if="loading"></Loader>
  <section class="bg-light py-3 py-md-5" v-else>
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
                Create Account
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
                      autocomplete="off"
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
                        type="submit"
                      >
                        Send
                      </button>
                    </div>
                  </div>
                </div>
                <div class="col-12">
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
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input
                      v-model="password"
                      type="password"
                      class="form-control"
                      name="password"
                      id="password"
                      required
                    />
                    <label for="password" class="form-label">Password</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="d-grid my-3">
                    <button
                      class="btn btn-primary btn-lg"
                      type="button"
                      @click="userCreateAccount"
                    >
                      Create Account
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
                    Have an Account?
                    <router-link
                      href="#!"
                      class="link-primary text-decoration-none"
                      to="/Login"
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
    const password = ref("");
    const code = ref("");

    const userSendCode = async () => {
      let params = {
        email: email.value,
      };
      await handleAPIRequest("Auth", "Auth/USER_SEND_CODE", params);
    };
    const userCreateAccount = async () => {
      let params = {
        email: email.value,
        code: code.value,
        password: password.value,
      };
      let hasError = await handleAPIRequest(
        "Auth",
        "Auth/USER_CREATE_aCCOUNT",
        params
      );
      if (!hasError) {
        router.push("/login");
      }
    };
    return {
      loading,
      showToast,
      message,
      hasError,
      email,
      code,
      password,
      userSendCode,
      userCreateAccount,
    };
  },
};
</script>

<style>
</style>