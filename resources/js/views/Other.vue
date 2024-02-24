<template>
  <Loader v-if="loading"></Loader>
  <Toast :showToast="showToast" :message="message" :hasError="hasError"></Toast>
  <Layout>
    <template v-slot:advertise-nav>
      <AdvertiseNav
        :mainname="'Others'"
        :subcategories="otherType"
        :linktype="'other'"
      />
    </template>
    <template v-slot:page-content>
      <Title :heading="'Discover more good finds'"></Title>
      <Warning
        v-if="(Object.keys(others)).length === 0"
        :message="'Oops.. Currently not available'"
      ></Warning>
    </template>
  </Layout>
</template>
    
    <script>
import { onMounted, computed } from "vue";
import { useStore } from "vuex";
import Layout from "../components/user/Layout.vue";
import AdvertiseNav from "../components/user/partials/AdvertiseNav.vue";
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
    Warning,
  },
  setup() {
    const store = useStore();
    const { hasError, message, loading, showToast, handleAPIRequest } =
      useAPIRequest();
    const subcategories = computed(() => store.state.Bazzar.subcategories);
    const otherType = computed(() => {
      return subcategories.value.filter((val) => val.category_id === 5);
    });
    const others = computed(() => store.getters["Bazzar/others"]);
    onMounted(() => {
      fetchOtherDetails();
    });
    const fetchOtherDetails = async () => {
      //await handleAPIRequest("Bazzar", "Bazzar/FETCH_OTHER_DETAILS");
    };
    return {
      loading,
      showToast,
      message,
      hasError,
      otherType,
      others,
    };
  },
};
</script>
    
    <style>
</style>