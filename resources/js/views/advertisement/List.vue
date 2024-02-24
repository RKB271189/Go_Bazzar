<template>
  <Loader v-if="loading"></Loader>
  <Toast :showToast="showToast" :message="message" :hasError="hasError"></Toast>
  <Layout>
    <template v-slot:menu-content>
      <SideNav />
    </template>
    <template v-slot:page-content>
      <h4 class="mt-4">Your Advertisement Here</h4>
      <div class="row">
        <div class="col-md-12">
          <div class="d-grid my-3 float-start">
            <router-link
              class="btn btn-success btn-block"
              type="button"
              :to="{ name: 'CreateAdvertise', params: { id: 0 } }"
            >
              Create New
            </router-link>
          </div>
        </div>
      </div>
      <div class="row" v-if="Object.keys(advertisments).length > 0">
        <AdvertiseCard
          :advertisements="advertisments"
          @advertiseDetail="viewDetail"
        ></AdvertiseCard>
      </div>
      <Warning v-else :message="'You do not have any advertisements'"></Warning>
    </template>
  </Layout>
</template>
    
    <script>
import Layout from "../../components/user/Layout.vue";
import SideNav from "../../components/user/account/SideNav.vue";
import { ref, onMounted, computed } from "vue";
import { useRouter } from "vue-router";
import { useStore } from "vuex";
import Loader from "../../components/Loader.vue";
import Toast from "../../components/Toast.vue";
import useAPIRequest from "../../services/api-request";
import Warning from "../../components/Warning.vue";
import AdvertiseCard from "../../components/AdvertiseCard.vue";
export default {
  components: {
    Loader,
    Toast,
    Layout,
    SideNav,
    Warning,
    AdvertiseCard,
  },
  setup() {
    const router = useRouter();
    const store = useStore();
    const { hasError, message, loading, showToast, status, handleAPIRequest } =
      useAPIRequest();
    const advertisments = computed(() => store.getters["User/advertisements"]);
    onMounted(() => {
      userAdvertisements();
    });
    const userAdvertisements = async () => {
      await handleAPIRequest("User", "User/USER_FETCH_ADVERTISEMENTS");
      if (hasError.value && status.value === 422) {
        router.push("/profile");
      }
    };
    const viewDetail = (id) => {
      router.push("/view/advertise/" + id);
    };
    return {
      loading,
      showToast,
      message,
      hasError,
      status,
      advertisments,
      userAdvertisements,
      viewDetail,
    };
  },
};
</script>
    
    <style>
</style>