<template>
  <Loader v-if="loading"></Loader>
  <Toast :showToast="showToast" :message="message" :hasError="hasError"></Toast>
  <nav
    class="navbar navbar-expand-lg navbar-dark bg-success"
    style="padding-top: 0px !important; padding-bottom: 0px !important"
  >
    <div class="container-fluid" v-if="subcategories.length > 0">
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#main_nav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="main_nav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <router-link class="nav-link" to="/">Home </router-link>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              data-bs-toggle="dropdown"
            >
              Free Ads
            </a>
            <ul class="dropdown-menu">
              <li v-for="val in freeAds" :key="val.id">
                <router-link
                  v-if="!isAdPage"
                  class="dropdown-item"
                  :to="'/advertisement/list/' + val.name + '-' + val.id"
                  >{{ val.name }}</router-link
                >
                <a
                  class="dropdown-item"
                  v-else
                  @click="$emit('changeCategoryType')"
                ></a>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              data-bs-toggle="dropdown"
            >
              Business Directory
            </a>
            <ul class="dropdown-menu">
              <li v-for="val1 in businesses" :key="val1.id">
                <a class="dropdown-item"> {{ val1.name }} &raquo; </a>
                <ul class="submenu dropdown-menu">
                  <li v-for="val2 in val1.subsubcategory" :key="val2.id">
                    <router-link
                      :to="
                        '/business/list/' +
                        val2.name +
                        '-' +
                        val1.id +
                        '-' +
                        val2.id
                      "
                      class="dropdown-item"
                      >{{ val2.name }}</router-link
                    >
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              data-bs-toggle="dropdown"
            >
              Services</a
            >
            <ul class="dropdown-menu">
              <li v-for="val in services" :key="val.id">
                <a class="dropdown-item" href="#">{{ val.name }}</a>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              data-bs-toggle="dropdown"
            >
              News Paper
            </a>
            <ul class="dropdown-menu">
              <li v-for="val in newspapers" :key="val.id">
                <a class="dropdown-item">
                  {{ val.name }}
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              data-bs-toggle="dropdown"
            >
              Others
            </a>
            <ul class="dropdown-menu">
              <li v-for="val in others" :key="val.id">
                <a class="dropdown-item">{{ val.name }}</a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/contact">
              Contact Us
            </router-link>
          </li>
          <li class="nav-item" v-if="!isLoggedIn">
            <router-link class="nav-link" to="/login"> Login </router-link>
          </li>
          <li class="nav-item dropdown" v-if="isLoggedIn">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              data-bs-toggle="dropdown"
            >
              Account
            </a>
            <ul class="dropdown-menu">
              <!-- <li>
                <router-link class="dropdown-item" to="/dashboard"
                  >Dashboard</router-link
                >
              </li> -->
              <li>
                <router-link class="dropdown-item" to="/profile"
                  >Profile</router-link
                >
              </li>
              <li>
                <router-link class="dropdown-item" to="/advertise"
                  >Advertise</router-link
                >
              </li>
              <li>
                <router-link class="dropdown-item" to="/list/other"
                  >Others</router-link
                >
              </li>
              <li>
                <a class="dropdown-item" @click="userLogout">Logout</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
import { ref, computed, onMounted } from "vue";
import { useStore } from "vuex";
import { useRouter } from "vue-router";
import Loader from "../../../components/Loader.vue";
import Toast from "../../../components/Toast.vue";
import useAPIRequest from "../../../services/api-request";
import accessLocalStorage from "../../../services/local-storage";
export default {
  components: {
    Loader,
    Toast,
  },
  setup() {
    const store = useStore();
    const router = useRouter();
    const { getLocalStorage, removeLocalStorage } = accessLocalStorage();
    const { hasError, message, loading, showToast, handleAPIRequest } =
      useAPIRequest();
    const subcategories = computed(() => store.state.Bazzar.subcategories);
    const isLoggedIn = ref(false);
    const freeAds = computed(() => {
      return subcategories.value.filter((val) => val.category_id === 1);
    });
    const businesses = computed(() => {
      return subcategories.value.filter((val) => val.category_id === 2);
    });
    const services = computed(() => {
      return subcategories.value.filter((val) => val.category_id === 3);
    });
    const newspapers = computed(() => {
      return subcategories.value.filter((val) => val.category_id === 4);
    });
    const others = computed(() => {
      return subcategories.value.filter((val) => val.category_id === 5);
    });
    onMounted(() => {
      showAccount();
    });
    const showAccount = () => {
      if (getLocalStorage("passport-token")) {
        isLoggedIn.value = true;
      } else {
        isLoggedIn.value = false;
      }
    };
    const userLogout = async () => {
      await handleAPIRequest("Auth", "Auth/USER_LOGOUT");
      if (!hasError.value) {
        removeLocalStorage("passport-token");
        showAccount();
        router.push("/");
      }
    };
    return {
      loading,
      showToast,
      message,
      hasError,
      isLoggedIn,
      subcategories,
      freeAds,
      businesses,
      services,
      newspapers,
      others,
      userLogout,
    };
  },
};
</script>

<style>
</style>