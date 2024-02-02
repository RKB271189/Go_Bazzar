<template>
  <Loader v-if="loading"></Loader>
  <Toast :showToast="showToast" :message="message" :hasError="hasError"></Toast>
  <Layout>
    <template v-slot:page-content>
      <AdvertiseDetail :advertisement="advertisement" />
    </template>
  </Layout>
</template>

<script>
import { ref, onMounted, computed } from "vue";
import { useRoute, useRouter } from "vue-router";
import { useStore } from "vuex";
import Layout from "../components/user/Layout.vue";
import Loader from "../components/Loader.vue";
import Toast from "../components/Toast.vue";
import useAPIRequest from "../services/api-request";
import AdvertiseDetail from "../components/AdvertiseDetail.vue";
export default {
  components: {
    Loader,
    Toast,
    Layout,
    AdvertiseDetail,
  },
  setup() {
    const router = useRouter();
    const store = useStore();
    const route = useRoute();
    const { hasError, message, loading, showToast, handleAPIRequest } =
      useAPIRequest();
    const advertisement = computed(() => store.getters["Bazzar/advertisement"]);
    onMounted(() => {
      fetchAdvertisementDetails();
    });
    const fetchAdvertisementDetails = async () => {
      const params = {
        id: route.params.id,
      };
      await handleAPIRequest(
        "Bazzar",
        "Bazzar/FETCH_ADVERTISEMENT_DETAILS",
        params
      );
    };
    return {
      loading,
      showToast,
      message,
      hasError,
      advertisement,
    };
  },
};
</script>

<style>
</style>