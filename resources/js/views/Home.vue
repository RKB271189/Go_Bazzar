<template>
  <Loader v-if="loading"></Loader>
  <Toast :showToast="showToast" :message="message" :hasError="hasError"></Toast>
  <Layout>
    <template v-slot:page-content>
      <Title :heading="'Our Market Place'" :viewmore="false" :linkto="null" />
      <div class="row">
        <Thumbnail :quickadveritsements="quickadvertisements" />
      </div>
      <Title
        :heading="'Discover more good finds'"
        :viewmore="true"
        :linkto="'/advertisement/list'"
      />
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
import AdvertiseCard from "../components/AdvertiseCard.vue";
import Title from "../components/user/partials/Title.vue";
import Thumbnail from "../components/user/partials/Thumbnail.vue";
import Loader from "../components/Loader.vue";
import Toast from "../components/Toast.vue";
import useAPIRequest from "../services/api-request";
export default {
  components: {
    Loader,
    Toast,
    Layout,
    AdvertiseCard,
    Title,
    Thumbnail,
  },
  setup() {
    const router = useRouter();
    const store = useStore();
    const { hasError, message, loading, showToast, handleAPIRequest } =
      useAPIRequest();
    const advertisements = computed(
      () => store.getters["Bazzar/advertisements"]
    );
    const quickadvertisements = computed(
      () => store.getters["Bazzar/quickadvertisements"]
    );
    onMounted(() => {
      fetchHomeDetails();
    });
    const fetchHomeDetails = async () => {
      await handleAPIRequest("Bazzar", "Bazzar/FETCH_HOME_DETAILS");
    };
    const viewDetail = (id) => {
      router.push("/advertisement/" + id);
    };
    return {
      loading,
      showToast,
      message,
      hasError,
      advertisements,
      quickadvertisements,
      viewDetail,
    };
  },
};
</script>

<style>
</style>