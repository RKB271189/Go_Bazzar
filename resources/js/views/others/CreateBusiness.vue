<template>
  <Toast :showToast="showToast" :message="message" :hasError="hasError"></Toast>
  <Loader v-if="loading"></Loader>
  <Layout v-else>
    <template v-slot:menu-content>
      <SideNav />
    </template>
    <template v-slot:page-content>
      <h4 class="mt-4">Create Your Business Here</h4>
      <form @submit.prevent="userSaveBusiness" enctype="multipart/form-data">
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
                name="business_picture"
                id="business_picture"
                autocomplete="off"
                ref="business_picture"
                @change="browseImage"
                v-bind:required="$route.params.id == 0"
              />
              <label for="business_picture" class="form-label"
                >Business Picture</label
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
              <select
                v-model="sub_category_id"
                id="sub_category_id"
                name="sub_category_id"
                type="text"
                class="form-control"
                @change="changeCategory"
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
              <select
                v-model="sub_sub_category_id"
                id="sub_sub_category_id"
                name="sub_sub_category_id"
                type="text"
                class="form-control"
              >
                <option
                  value="0"
                  :selected="sub_sub_category_id === 0 ? 'selected' : ''"
                >
                  Select
                </option>
                <option
                  v-for="val in filteredCategory"
                  :value="val.id"
                  :key="val.id"
                >
                  {{ val.name }}
                </option>
              </select>
              <label for="sub_sub_category_id" class="form-label"
                >Sub Category</label
              >
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-floating mb-3">
              <input
                v-model="business_email"
                type="email"
                class="form-control"
                name="business_email"
                id="business_email"
                autocomplete="off"
                required
              />
              <label for="business_email" class="form-label">Email</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating mb-3">
              <input
                v-model="business_no"
                type="text"
                class="form-control"
                name="business_no"
                id="business_no"
                autocomplete="off"
                required
              />
              <label for="business_no" class="form-label">Contact No</label>
            </div>
          </div>
        </div>
        <div class="row">
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
    const filteredCategory = ref([]);
    const province = computed(() => store.getters["User/province"]);
    const title = ref("");
    const business_picture = ref(null);
    const address = ref("");
    const business_email = ref("");
    const business_no = ref("");
    const selected_business_picture = ref(null);
    const province_id = ref(0);
    const city_id = ref(0);
    const sub_category = computed(() => store.getters["User/sub_categories"]);
    const sub_category_id = ref(0);
    const sub_sub_category = computed(
      () => store.getters["User/sub_sub_categories"]
    );
    const sub_sub_category_id = ref(0);
    const business = computed(() => store.getters["User/business"]);
    onMounted(async () => {
      let id = route.params.id;
      await fetchBUsinessRequires(id);
      populateBusiness();
    });
    const fetchBUsinessRequires = async (id) => {
      await handleAPIRequest("User", "User/USER_FETCH_BUSINESS", {
        id: id,
      });
    };
    const populateBusiness = () => {
      title.value = business.value.title;
      address.value = business.value.address;
      province_id.value = business.value.province_id;
      city_id.value = business.value.city_id;
      sub_category_id.value = business.value.sub_category_id;
      business_email.value = business.service_email;
      business_no.value = business.service_no;
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
    const changeCategory = (event) => {
      filterCategories(parseInt(event.target.value));
    };
    const filterCategories = (id) => {
      filteredCategory.value = sub_sub_category.value.filter(
        (category) => category.sub_category_id === id
      );
    };
    const browseImage = () => {
      selected_business_picture.value = business_picture.value.files[0];
    };

    const userSaveBusiness = async () => {
      let params = {
        id: route.params.id,
        title: title.value,
        business_email: business_email.value,
        business_no: business_no.value,
        address: address.value,
        sub_category_id: sub_category_id.value,
        sub_sub_category_id: sub_sub_category_id.value,
        province_id: province_id.value,
        city_id: city_id.value,
        business_picture: selected_business_picture.value,
      };
      await handleAPIRequest("User", "User/USER_CREATE_BUSINESS", params);
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
      business_picture,
      address,
      business_email,
      business_no,
      province,
      filteredCity,
      province_id,
      city_id,
      sub_category,
      sub_category_id,
      filteredCategory,
      sub_sub_category_id,
      business,
      changeProvince,
      changeCategory,
      browseImage,
      userSaveBusiness,
    };
  },
};
</script>
      
      <style>
</style>