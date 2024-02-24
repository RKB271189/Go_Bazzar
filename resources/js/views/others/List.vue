<template>
  <Loader v-if="loading"></Loader>
  <Toast :showToast="showToast" :message="message" :hasError="hasError"></Toast>
  <Layout>
    <template v-slot:menu-content>
      <SideNav />
    </template>
    <template v-slot:page-content>
      <h4 class="mt-4">Your Services and Business</h4>
      <Warning
        :message="'You do not have any Services or Business listed'"
      ></Warning>
      <div class="row">
        <div class="col-md-6">
          <div class="card text-center">
            <div class="card-header">Create Service</div>
            <div class="card-body">
              <h5 class="card-title">Add your services to our portal</h5>
              <p class="card-text other-services-business-card-info">
                Services listing for the following group : Accounting & Tax,
                Driving School, Home made Food, Legal Services, Financial
                Planning, Decorations-Events etc
              </p>
              <router-link
                class="btn btn-primary"
                :to="{ name: 'CreateService', params: { id: 0 } }"
                >Create</router-link
              >
            </div>
            <div class="card-footer text-muted">Currently Free</div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card text-center">
            <div class="card-header">Create Business</div>
            <div class="card-body">
              <h5 class="card-title">Add your business to our portal</h5>
              <p class="card-text other-services-business-card-info">
                Business Listing for the following group : Travels (Taxi/Cab,
                Motels), Other Business like (Garage, Cleaning, Car Dealers),
                Real Estate like (Realtor, Mortgage Agents)etc
              </p>
              <router-link
                class="btn btn-primary"
                :to="{ name: 'CreateBusiness', params: { id: 0 } }"
                >Create</router-link
              >
            </div>
            <div class="card-footer text-muted">Currently Free</div>
          </div>
        </div>
      </div>
      <div class="row">
        <h5 class="mt-4">Business Added (User will see this)</h5>
        <DirectoryCard :business="businesses" />
      </div>
      <div class="row">
        <h5 class="mt-4">Servicess Added (User will see this)</h5>
        <ServiceCard :services="services" />
      </div>
    </template>
  </Layout>
</template>
      
      <script>
import Layout from "../../components/user/Layout.vue";
import SideNav from "../../components/user/account/SideNav.vue";
import { ref, onMounted, computed } from "vue";
import { useRouter } from "vue-router";
import { useStore } from "vuex";
import Loader from "../../components/Loader.vue";
import Toast from "../../components/Toast.vue";
import useAPIRequest from "../../services/api-request";
import Warning from "../../components/Warning.vue";
import ServiceCard from "../../components/ServiceCard.vue";
import DirectoryCard from "../../components/DirectoryCard.vue";
export default {
  components: {
    Loader,
    Toast,
    Layout,
    SideNav,
    Warning,
    ServiceCard,
    DirectoryCard,
  },
  setup() {
    const router = useRouter();
    const store = useStore();
    const { hasError, message, loading, showToast, status, handleAPIRequest } =
      useAPIRequest();
    const services = computed(() => store.getters["User/services"]);
    const businesses = computed(() => store.getters["User/businesses"]);
    onMounted(() => {
      fetchUserOthers();
    });
    const fetchUserOthers = async () => {
      await handleAPIRequest("User", "User/USER_FETCH_OTHERS");
    };

    return {
      loading,
      showToast,
      message,
      hasError,
      status,
      services,
      businesses,
    };
  },
};
</script>
      
      <style>
</style>