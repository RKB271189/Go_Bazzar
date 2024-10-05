<template>
  <Loader v-if="loading"></Loader>
  <Toast :showToast="showToast" :message="message" :hasError="hasError"></Toast>
  <Layout>
    <template v-slot:page-content>
      <h4 class="mt-4">All Advertisement</h4>
      <div class="row"></div>
    </template>
  </Layout>
</template>
    
    <script>
import Layout from "../../components/admin/Layout.vue";
import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";
import Loader from "../../components/Loader.vue";
import Toast from "../../components/Toast.vue";
import useAPIRequest from "../../services/api-request";
export default {
  components: {
    Loader,
    Toast,
    Layout,
  },
  setup() {
    const router = useRouter();
    const { hasError, message, loading, showToast, handleAPIRequest } =
      useAPIRequest();
    let params = {};
    onMounted(() => {
      //userDailyAnalysis();
    });
    const userDailyAnalysis = async () => {
      await handleAPIRequest(
        "Dashboard",
        "Dashboard/USER_DAILY_ANALYSIS",
        params
      );
    };
    return {
      loading,
      showToast,
      message,
      hasError,
      userDailyAnalysis,
    };
  },
};
</script>
    
    <style>
</style>