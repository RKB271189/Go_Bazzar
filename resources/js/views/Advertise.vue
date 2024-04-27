<template>
  <Loader v-if="loading"></Loader>
  <Toast :showToast="showToast" :message="message" :hasError="hasError"></Toast>
  <Layout>
    <template v-slot:page-content>
      <AdvertiseDetail :module="'Bazzar'" />
    </template>
  </Layout>
</template>

<script>
import { onMounted } from "vue";
import { useRoute } from "vue-router";
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
    const route = useRoute();
    const { hasError, message, loading, showToast, handleAPIRequest } =
      useAPIRequest();
    onMounted(async () => {
      await fetchAdvertisementDetails();
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
    };
  },
};
</script>

<style>
</style>