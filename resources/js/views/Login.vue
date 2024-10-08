<template>
  <Toast :showToast="showToast" :message="message" :hasError="hasError"></Toast>
  <Loader v-if="loading"></Loader>
  <section class="bg-light py-3 py-md-5" v-else>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
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
                Sign in to your account
              </h2>
              <form action="#!">
                <div class="row gy-2 overflow-hidden">
                  <div class="col-12">
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
                  <div class="col-12">
                    <div class="form-floating mb-3">
                      <input
                        v-model="password"
                        :type="passwordType"
                        class="form-control"
                        name="password"
                        id="password"
                        required
                      />
                      <span
                        class="position-absolute top-50 translate-middle-y"
                        :style="{ right: '5px' }"
                      >
                        <EyeIcon
                          class="hero-icon-small"
                          :style="{ cursor: 'pointer', color: '#8c8787' }"
                          v-if="passwordType === 'password'"
                          @click="tooglePasswordShow(`text`)"
                        ></EyeIcon>
                        <EyeSlashIcon
                          class="hero-icon-small"
                          :style="{ cursor: 'pointer', color: '#8c8787' }"
                          @click="tooglePasswordShow(`password`)"
                          v-else
                        ></EyeSlashIcon>
                      </span>
                      <label for="password" class="form-label">Password</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="d-flex gap-2 justify-content-between">
                      <div class="form-check">
                        <input
                          class="form-check-input"
                          type="checkbox"
                          v-model="remember"
                          name="rememberMe"
                          id="rememberMe"
                        />
                        <label
                          class="form-check-label text-secondary"
                          for="rememberMe"
                        >
                          Keep me logged in
                        </label>
                      </div>
                      <router-link
                        to="/forgot-password"
                        class="link-primary text-decoration-none"
                        >Forgot password?</router-link
                      >
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="d-grid my-3">
                      <button
                        class="btn btn-primary btn-lg"
                        type="button"
                        @click="userVerify"
                      >
                        Log in
                      </button>
                    </div>
                  </div>
                  <!-- <div class="col-12">
                    <div class="row">
                      <div class="col-md-5">
                        <hr />
                      </div>
                      <div class="col-md-2">OR</div>
                      <div class="col-md-5">
                        <hr />
                      </div>
                    </div>
                  </div> -->
                  <!-- <div class="col-12">
                    <div class="d-grid my-3">
                      <button class="btn btn-success btn-lg">
                        <img
                          :src="'/images/google.jpg'"
                          class="login-social-icon"
                        />
                        Sign in with Google
                      </button>
                    </div>
                  </div> -->
                  <!-- <div class="col-12">
                    <div class="d-grid my-3">
                      <button class="btn btn-primary btn-lg">
                        <img
                          :src="'/images/login-facebook.png'"
                          class="login-social-icon"
                        />
                        Sign in with Facebook
                      </button>
                    </div>
                  </div> -->
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
                      Don't have an account?
                      <router-link
                        class="link-primary text-decoration-none"
                        to="/signup"
                        >Sign up</router-link
                      >
                    </p>
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
                        to="/"
                        >Home</router-link
                      >
                    </p>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { ref, computed, onMounted } from "vue";
import { useRouter, useRoute } from "vue-router";
import { useStore } from "vuex";
import Loader from "../components/Loader.vue";
import Toast from "../components/Toast.vue";
import useAPIRequest from "../services/api-request";
import accessLocalStorage from "../services/local-storage";
import { EyeIcon, EyeSlashIcon } from "@heroicons/vue/24/outline";
export default {
  components: {
    Loader,
    Toast,
    EyeIcon,
    EyeSlashIcon,
  },
  setup() {
    const router = useRouter();
    const store = useStore();
    const route = useRoute();
    const { hasError, message, loading, showToast, handleAPIRequest } =
      useAPIRequest();
    const { setLocalStorage } = accessLocalStorage();
    const email = ref("");
    const password = ref("");
    const remember = ref(false);
    const passwordType = ref("password");
    const tooglePasswordShow = (type) => {
      passwordType.value = type;
    };
    onMounted(() => {
      if (route.params.slug === "unauthorized") {
        showToast.value = true;
        message.value = "Please login! To proceed further";
        hasError.value = true;
      }
    });
    const userVerify = async () => {
      let params = {
        email: email.value,
        password: password.value,
        remember: remember.value,
      };
      await handleAPIRequest("Auth", "Auth/USER_VERIFY_CREDENTIALS", params);
      if (!hasError.value) {
        setLocalStorage(
          "passport-token",
          computed(() => store.getters["Auth/passportToken"]).value
        );
        router.push(computed(() => store.getters["Auth/redirectURL"]).value);
      }
    };
    return {
      loading,
      showToast,
      message,
      hasError,
      email,
      password,
      remember,
      passwordType,
      tooglePasswordShow,
      userVerify,
    };
  },
};
</script>

<style>
</style>