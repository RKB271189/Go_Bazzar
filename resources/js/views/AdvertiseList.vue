<template>
  <Toast :showToast="showToast" :message="message" :hasError="hasError"></Toast>
  <Loader v-if="loading"></Loader>
  <Layout v-else>
    <template v-slot:advertise-nav>
      <AdvertiseNav
        :mainname="'Free Ads'"
        :subcategories="freeAds"
        :linktype="'advertisement'"
        @changeCategoryType="selectAdType"
      />
    </template>
    <template v-slot:page-content>
      <Title :heading="'Our Market Place'" />
      <AdvertiseCard
        :advertisements="advertisements"
        @advertiseDetail="viewDetail"
      />
    </template>
  </Layout>
</template>
  
  <script>
import { ref, onMounted, computed } from "vue";
import { useRouter } from "vue-router";
import { useStore } from "vuex";
import Layout from "../components/user/Layout.vue";
import AdvertiseNav from "../components/user/partials/AdvertiseNav.vue";
import AdvertiseCard from "../components/AdvertiseCard.vue";
import Title from "../components/user/partials/Title.vue";
import Loader from "../components/Loader.vue";
import Toast from "../components/Toast.vue";
import useAPIRequest from "../services/api-request";
export default {
  components: {
    Loader,
    Toast,
    Layout,
    AdvertiseNav,
    AdvertiseCard,
    Title,
  },
  setup() {
    const isAdPage = ref(true);
    const router = useRouter();
    const store = useStore();
    const { hasError, message, loading, showToast, handleAPIRequest } =
      useAPIRequest();
    const subcategories = computed(() => store.state.Bazzar.subcategories);
    const freeAds = computed(() => {
      return subcategories.value.filter((val) => val.category_id === 1);
    });
    const advertisements = computed(
      () => store.getters["Bazzar/advertisements"]
    );
    onMounted(() => {
      fetchAdvertiseDetails();
    });
    const fetchAdvertiseDetails = async () => {
      await handleAPIRequest("Bazzar", "Bazzar/FETCH_ADVERTISE_DETAILS");
    };
    const viewDetail = (id) => {
      router.push("/advertisement/" + id);
    };
    const selectAdType = () => {
      fetchAdvertiseDetails();
    };
    return {
      isAdPage,
      loading,
      showToast,
      message,
      hasError,
      freeAds,
      advertisements,
      viewDetail,
      selectAdType,
    };
  },
};
</script>
  
  <style>
</style>