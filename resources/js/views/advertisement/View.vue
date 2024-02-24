<template>
  <Loader v-if="loading"></Loader>
  <Toast :showToast="showToast" :message="message" :hasError="hasError"></Toast>
  <Layout>
    <template v-slot:page-content>
      <div class="row">
        <div class="col-md-10">
          <h4 class="mt-4">This is how people will see your advertisement</h4>
        </div>
        <div class="col-md-2 text-md-end">
          <router-link
            class="btn btn-success btn-block mt-4"
            type="button"
            :to="{ name: 'CreateAdvertise', params: { id: id } }"
          >
            Edit
          </router-link>
        </div>
      </div>
      <AdvertiseDetail :module="'User'" />
    </template>
  </Layout>
</template>

<script>
import Layout from "../../components/user/account/Layout.vue";
import { onMounted, computed } from "vue";
import { useRoute } from "vue-router";
import { useStore } from "vuex";
import Loader from "../../components/Loader.vue";
import Toast from "../../components/Toast.vue";
import useAPIRequest from "../../services/api-request";
import AdvertiseDetail from "../../components/AdvertiseDetail.vue";
export default {
  components: {
    Loader,
    Toast,
    Layout,
    AdvertiseDetail,
  },
  setup() {
    const route = useRoute();
    const store = useStore();
    const { status, hasError, message, loading, showToast, handleAPIRequest } =
      useAPIRequest();
    const id = route.params.id;
    onMounted(async () => {
      await fetchAdvertiseRequires();
    });
    const fetchAdvertiseRequires = async () => {
      await handleAPIRequest("User", "User/USER_FETCH_ADVERTISEMENT", {
        id: id,
      });
    };
    return {
      loading,
      showToast,
      message,
      hasError,
      id,
    };
  },
};
</script>

<style>
</style>