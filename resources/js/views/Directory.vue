<template>
  <Loader v-if="loading"></Loader>
  <Toast :showToast="showToast" :message="message" :hasError="hasError"></Toast>
  <Layout>
    <template v-slot:menu-content>
      <SubSideNav
        :subcategories="businessType"        
      />
    </template>
    <template v-slot:page-content>
      <Title :heading="'Discover more good finds'"></Title>
      <DirectoryCard :business="business" />
    </template>
  </Layout>
</template>
  
<script>
import { onMounted, computed } from "vue";
import { useStore } from "vuex";
import Layout from "../components/user/Layout.vue";
import SubSideNav from "../components/user/partials/Sub-SideNav.vue";
import DirectoryCard from "../components/DirectoryCard.vue";
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
    SubSideNav,
    DirectoryCard,
  },
  setup() {
    const store = useStore();
    const { hasError, message, loading, showToast, handleAPIRequest } =
      useAPIRequest();
    const subcategories = computed(() => store.state.Bazzar.subcategories);
    const businessType = computed(() => {
      return subcategories.value.filter((val) => val.category_id === 2);
    });    
    const business = computed(() => store.getters["Bazzar/businesses"]);
    onMounted(() => {
      fetchBusinessDetails();
    });
    const fetchBusinessDetails = async () => {
      await handleAPIRequest("Bazzar", "Bazzar/FETCH_BUSINESS_DETAILS");
    };
    return {
      loading,
      showToast,
      message,
      hasError,
      businessType,      
      business,
    };
  },
};
</script>
  
  <style>
</style>