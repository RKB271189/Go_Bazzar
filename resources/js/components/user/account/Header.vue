<template>
  <Loader v-if="loading"></Loader>
  <Toast :showToast="showToast" :message="message" :hasError="hasError"></Toast>
  <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container-fluid">
      <button class="btn btn-danger" id="sidebarToggle">
        <Bars4Icon class="hero-icon"></Bars4Icon>
      </button>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              id="navbarDropdown"
              href="#"
              role="button"
              data-bs-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
              style="color: black !important"
            >
              <Cog8ToothIcon class="hero-icon"></Cog8ToothIcon>
            </a>
            <div
              class="dropdown-menu dropdown-menu-end"
              aria-labelledby="navbarDropdown"
            >
              <a class="dropdown-item" href="#!">Settings</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" @click="userLogout">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
import { useRouter } from "vue-router";
import useAPIRequest from "../../../services/api-request";
import Loader from "../../../components/Loader.vue";
import Toast from "../../../components/Toast.vue";
import accessLocalStorage from "../../../services/local-storage";
import { Bars4Icon, Cog8ToothIcon } from "@heroicons/vue/24/outline";
export default {
  components: {
    Loader,
    Toast,
    Bars4Icon,
    Cog8ToothIcon,
  },
  setup() {
    const router = useRouter();
    const { removeLocalStorage } = accessLocalStorage();
    const { hasError, message, loading, showToast, handleAPIRequest } =
      useAPIRequest();
    const userLogout = async () => {
      await handleAPIRequest("Auth", "Auth/USER_LOGOUT");
      if (!hasError.value) {
        removeLocalStorage("passport-token");
        router.push("/login");
      }
    };
    return {
      loading,
      showToast,
      message,
      hasError,
      userLogout,
    };
  },
};
</script>

<style>
</style>