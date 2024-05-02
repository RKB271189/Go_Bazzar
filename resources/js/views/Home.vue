<template>
  <Toast :showToast="showToast" :message="message" :hasError="hasError"></Toast>
  <Loader v-if="loading"></Loader>
  <Layout v-else>
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
        v-if="advertisements.length > 0"
        :advertisements="advertisements"
        @advertiseDetail="viewDetail"
      />
      <Warning
        v-else
        :message="'Oops.. No items found. Keep Searching'"
      ></Warning>
      <Title
        :heading="'Services Available to community'"
        :viewmore="true"
        :linkto="'/service/list'"
      ></Title>
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
      <Title
        :heading="'Businesses Available to community'"
        :viewmore="true"
        :linkto="'/business/list'"
      ></Title>
      <div class="row">
        <DirectoryCard
          v-if="businesses.length > 0"
          :business="businesses"
        ></DirectoryCard>
        <Warning
          v-else
          :message="'Oops.. No businesses has been registered'"
        ></Warning>
      </div>
    </template>
  </Layout>
</template>

<script>
import { onMounted, computed } from "vue";
import { useRouter } from "vue-router";
import { useStore } from "vuex";
import Layout from "../components/user/Layout.vue";
import AdvertiseCard from "../components/AdvertiseCard.vue";
import ServiceCard from "../components/ServiceCard.vue";
import DirectoryCard from "../components/DirectoryCard.vue";
import Warning from "../components/Warning.vue";
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
    ServiceCard,
    DirectoryCard,
    Warning,
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
    const services = computed(() => store.getters["Bazzar/services"]);
    const businesses = computed(() => store.getters["Bazzar/businesses"]);
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
      services,
      businesses,
      quickadvertisements,
      viewDetail,
    };
  },
};
</script>

<style>
</style>