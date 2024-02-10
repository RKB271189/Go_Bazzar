<template>
  <Loader v-if="loading"></Loader>
  <Toast :showToast="showToast" :message="message" :hasError="hasError"></Toast>
  <Layout>
    <template v-slot:advertise-nav>
      <AdvertiseNav :mainname="'Services'" :subcategories="subcategories" />
    </template>
    <template v-slot:page-content>
      <Title :heading="'Discover more good finds'"></Title>
      <ServiceCard :services="services"></ServiceCard>
    </template>
  </Layout>
</template>
  
  <script>
import { onMounted, computed } from "vue";
import { useStore } from "vuex";
import Layout from "../components/user/Layout.vue";
import AdvertiseNav from "../components/user/partials/AdvertiseNav.vue";
import ServiceCard from "../components/ServiceCard.vue";
import Title from "../components/user/partials/Title.vue";
import Loader from "../components/Loader.vue";
import Toast from "../components/Toast.vue";
import useAPIRequest from "../services/api-request";
export default {
  components: {
    Loader,
    Toast,
    Layout,
    Title,
    AdvertiseNav,
    ServiceCard,
  },
  setup() {
    const store = useStore();
    const { hasError, message, loading, showToast, handleAPIRequest } =
      useAPIRequest();
    const subcategories = computed(() => store.getters["Bazzar/subcategories"]);
    const services = computed(() => store.getters["Bazzar/services"]);
    onMounted(() => {
      fetchServiceDetails();
    });
    const fetchServiceDetails = async () => {
      await handleAPIRequest("Bazzar", "Bazzar/FETCH_SERVICE_DETAILS");
    };
    return {
      loading,
      showToast,
      message,
      hasError,
      subcategories,
      services,
    };
  },
};
</script>
  
  <style>
</style>