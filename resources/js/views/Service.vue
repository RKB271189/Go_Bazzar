<template>
  <Toast :showToast="showToast" :message="message" :hasError="hasError"></Toast>
  <Loader v-if="loading"></Loader>
  <Layout v-else>
    <template v-slot:advertise-nav>
      <AdvertiseNav
        :mainname="'Services'"
        :subcategories="serviceType"
        :linktype="'service'"
      />
    </template>
    <template v-slot:page-content>
      <Title :heading="'Discover more good finds'"></Title>
      <div class="row">
        <ServiceCard
          v-if="services.length > 0"
          :services="services"
        ></ServiceCard>
        <Warning
          v-else
          :message="'Oops.. No services has been registered'"
        ></Warning>
      </div>
    </template>
  </Layout>
</template>
  
  <script>
import { onMounted, computed } from "vue";
import { useStore } from "vuex";
import Layout from "../components/user/Layout.vue";
import AdvertiseNav from "../components/user/partials/AdvertiseNav.vue";
import ServiceCard from "../components/ServiceCard.vue";
import Warning from "../components/Warning.vue";
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
    Warning,
  },
  setup() {
    const store = useStore();
    const { hasError, message, loading, showToast, handleAPIRequest } =
      useAPIRequest();
    const subcategories = computed(() => store.state.Bazzar.subcategories);
    const serviceType = computed(() => {
      return subcategories.value.filter((val) => val.category_id === 3);
    });
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
      serviceType,
      services,
    };
  },
};
</script>
  
  <style>
</style>