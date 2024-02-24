<template>
  <Loader v-if="loading"></Loader>
  <Toast :showToast="showToast" :message="message" :hasError="hasError"></Toast>
  <Layout>
    <template v-slot:menu-content>
      <SideNav />
    </template>
    <template v-slot:page-content>
      <h4 class="mt-4">Create Your Service Here</h4>
      <form @submit.prevent="userSaveService" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-6">
            <div class="form-floating mb-3">
              <input
                v-model="title"
                type="text"
                class="form-control"
                name="title"
                id="title"
                autocomplete="off"
                required
              />
              <label for="title" class="form-label">Title</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating mb-3">
              <input
                type="file"
                class="form-control"
                name="service_picture"
                id="service_picture"
                autocomplete="off"
                ref="service_picture"
                @change="browseImage"
                v-bind:required="$route.params.id == 0"
              />
              <label for="service_picture" class="form-label"
                >Service Picture</label
              >
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-floating mb-3">
              <select
                v-model="province_id"
                id="province"
                name="province"
                type="text"
                class="form-control"
                @change="changeProvince"
              >
                <option
                  value="0"
                  :selected="province_id === 0 ? 'selected' : ''"
                >
                  Select
                </option>
                <option v-for="val in province" :value="val.id" :key="val.id">
                  {{ val.name }}
                </option>
              </select>
              <label for="province" class="form-label">Province</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating mb-3">
              <select
                v-model="city_id"
                id="city"
                name="city"
                type="text"
                class="form-control"
              >
                <option value="0" :selected="city_id === 0 ? 'selected' : ''">
                  Select
                </option>
                <option
                  v-for="val in filteredCity"
                  :value="val.id"
                  :key="val.id"
                >
                  {{ val.name }}
                </option>
              </select>
              <label for="city" class="form-label">City</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-floating mb-3">
              <textarea
                v-model="description"
                type="text"
                class="form-control"
                name="description"
                id="description"
                autocomplete="off"
                maxlength="300"
                style="height: 100px"
                required
              ></textarea>
              <label for="description" class="form-label">Description</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating mb-3">
              <textarea
                v-model="address"
                type="text"
                class="form-control"
                name="address"
                id="address"
                autocomplete="off"
                maxlength="300"
                style="height: 100px"
                required
              ></textarea>
              <label for="address" class="form-label">Address</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-floating mb-3">
              <select
                v-model="sub_category_id"
                id="sub_category_id"
                name="sub_category_id"
                type="text"
                class="form-control"
              >
                <option
                  value="0"
                  :selected="sub_category_id === 0 ? 'selected' : ''"
                >
                  Select
                </option>
                <option
                  v-for="val in sub_category"
                  :value="val.id"
                  :key="val.id"
                >
                  {{ val.name }}
                </option>
              </select>
              <label for="sub_category_id" class="form-label">Category</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating mb-3">
              <input
                v-model="service_email"
                type="email"
                class="form-control"
                name="service_email"
                id="service_email"
                autocomplete="off"
                required
              />
              <label for="service_email" class="form-label">Email</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-floating mb-3">
              <input
                v-model="service_no"
                type="text"
                class="form-control"
                name="service_no"
                id="service_no"
                autocomplete="off"
                required
              />
              <label for="service_no" class="form-label">Contact No</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
            <div class="d-grid my-3">
              <button class="btn btn-primary btn-block" type="submit">
                Submit
              </button>
            </div>
          </div>
        </div>
      </form>
    </template>
  </Layout>
</template>
    
    <script>
import Layout from "../../components/user/Layout.vue";
import SideNav from "../../components/user/account/SideNav.vue";
import { ref, onMounted, computed } from "vue";
import { useRoute, useRouter } from "vue-router";
import { useStore } from "vuex";
import Loader from "../../components/Loader.vue";
import Toast from "../../components/Toast.vue";
import useAPIRequest from "../../services/api-request";
export default {
  components: {
    Loader,
    Toast,
    Layout,
    SideNav,
  },
  setup() {
    const router = useRouter();
    const route = useRoute();
    const store = useStore();
    const { status, hasError, message, loading, showToast, handleAPIRequest } =
      useAPIRequest();
    const filteredCity = ref([]);
    const province = computed(() => store.getters["User/province"]);
    const title = ref("");
    const service_picture = ref(null);
    const description = ref("");
    const address = ref("");
    const service_email = ref("");
    const service_no = ref("");
    const selected_service_picture = ref(null);
    const province_id = ref(0);
    const city_id = ref(0);
    const sub_category = computed(() => store.getters["User/sub_categories"]);
    const sub_category_id = ref(0);
    const service = computed(() => store.getters["User/service"]);
    onMounted(async () => {
      let id = route.params.id;
      await fetchServiceRequires(id);
      populateService();
    });
    const populateService = () => {
      title.value = service.value.title;
      description.value = service.value.description;
      address.value = service.value.address;
      province_id.value = service.value.province_id;
      city_id.value = service.value.city_id;
      sub_category_id.value = service.value.sub_category_id;
      service_email.value = service.service_email;
      service_no.value = service.service_no;
      filterCity(province_id.value);
    };
    const changeProvince = (event) => {
      const selectedProvinceId = parseInt(event.target.value);
      filterCity(selectedProvinceId);
    };
    const filterCity = (province_id) => {
      filteredCity.value = province.value
        .filter((province) => province.id === province_id)
        .map((selectedProvince) => selectedProvince.city)
        .flat();
    };
    const browseImage = () => {
      selected_service_picture.value = service_picture.value.files[0];
    };
    const fetchServiceRequires = async (id) => {
      await handleAPIRequest("User", "User/USER_FETCH_SERVICE", {
        id: id,
      });
    };
    const userSaveService = async () => {
      let params = {
        id: route.params.id,
        title: title.value,
        service_email: service_email.value,
        service_no: service_no.value,
        description: description.value,
        address: address.value,
        sub_category_id: sub_category_id.value,
        province_id: province_id.value,
        city_id: city_id.value,
        service_picture: selected_service_picture.value,
      };
      await handleAPIRequest("User", "User/USER_CREATE_SERVICE", params);
      if (!hasError.value) {
        router.push("/list/other");
      }
    };
    return {
      loading,
      showToast,
      message,
      hasError,
      status,
      title,
      service_picture,
      description,
      address,
      service_email,
      service_no,
      province,
      filteredCity,
      province_id,
      city_id,
      sub_category,
      sub_category_id,
      changeProvince,
      browseImage,
      userSaveService,
    };
  },
};
</script>
    
    <style>
</style>