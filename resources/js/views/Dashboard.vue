<template>
  <Toast :showToast="showToast" :message="message" :hasError="hasError"></Toast>
  <Loader v-if="loading"></Loader>
  <Layout v-else>
    <template v-slot:menu-content>
      <SideNav />
    </template>
    <template v-slot:page-content>
      <h4 class="mt-4">Your account analysis</h4>
      <div class="row">Comming Soon</div>
    </template>
  </Layout>
</template>

<script>
import Layout from "../components/user/Layout.vue";
import SideNav from "../components/user/account/SideNav.vue";
import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";
import Loader from "../components/Loader.vue";
import Toast from "../components/Toast.vue";
import useAPIRequest from "../services/api-request";
export default {
  components: {
    Loader,
    Toast,
    Layout,
    SideNav,
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