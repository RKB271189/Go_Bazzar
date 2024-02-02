<template>
  <Loader v-if="loading"></Loader>
  <Toast :showToast="showToast" :message="message" :hasError="hasError"></Toast>
  <Layout>
    <template v-slot:page-content>
      <h4 class="mt-4">Create/Update Your Profile</h4>
      <div class="row">
        <div class="col-md-6">
          <div class="form-floating mb-3">
            <input
              v-model="first_name"
              type="text"
              class="form-control"
              name="first_name"
              id="first_name"
              autocomplete="off"
              required
            />
            <label for="first_name" class="form-label">First Name</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-floating mb-3">
            <input
              v-model="last_name"
              type="text"
              class="form-control"
              name="last_name"
              id="last_name"
              autocomplete="off"
              required
            />
            <label for="last_name" class="form-label">Last Name</label>
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
              <option value="0" :selected="province_id === 0 ? 'selected' : ''">
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
              <option v-for="val in filteredCity" :value="val.id" :key="val.id">
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
            <input
              v-model="postal_code"
              type="text"
              class="form-control"
              name="postal_code"
              id="postal_code"
              autocomplete="off"
              required
            />
            <label for="postal_code" class="form-label">Postal Code</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-floating mb-3">
            <input
              v-model="contact_no"
              type="text"
              class="form-control"
              name="contact_no"
              id="contact_no"
              autocomplete="off"
              required
            />
            <label for="contact_no" class="form-label">Contact No.</label>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2">
          <div class="d-grid my-3">
            <button
              class="btn btn-primary btn-block"
              type="button"
              @click="userCreateProfile"
            >
              Submit
            </button>
          </div>
        </div>
      </div>
    </template>
  </Layout>
</template>

<script>
import Layout from "../components/user/account/Layout.vue";
import { ref, onMounted, computed } from "vue";
import { useStore } from "vuex";
import Loader from "../components/Loader.vue";
import Toast from "../components/Toast.vue";
import useAPIRequest from "../services/api-request";
export default {
  components: {
    Loader,
    Toast,
    Layout,
  },
  setup() {
    const store = useStore();
    const province = computed(() => store.getters["User/province"]);
    const filteredCity = ref([]);
    const profile = computed(() => store.getters["User/profile"]);
    const { hasError, message, loading, showToast, handleAPIRequest } =
      useAPIRequest();
    const first_name = ref("");
    const last_name = ref("");
    const province_id = ref(0);
    const city_id = ref(0);
    const postal_code = ref("");
    const contact_no = ref("");
    onMounted(async () => {
      await userFetchProfile();
      populateProfile();
    });
    const userFetchProfile = async () => {
      await handleAPIRequest("User", "User/USER_FETCH_PROFILE");
    };
    const populateProfile = () => {
      if (profile.value) {
        filterCity(profile.value.province_id);
        first_name.value = profile.value.first_name;
        last_name.value = profile.value.last_name;
        province_id.value = profile.value.province_id;
        city_id.value = profile.value.city_id;
        postal_code.value = profile.value.postal_code;
        contact_no.value = profile.value.contact_no;
      }
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
    const userCreateProfile = async () => {
      let params = {
        first_name: first_name.value,
        last_name: last_name.value,
        province_id: province_id.value,
        city_id: city_id.value,
        postal_code: postal_code.value,
        contact_no: contact_no.value,
      };
      await handleAPIRequest("User", "User/USER_CREATE_PROFILE", params);
    };
    return {
      loading,
      showToast,
      message,
      hasError,
      province,
      filteredCity,
      changeProvince,
      first_name,
      last_name,
      province_id,
      city_id,
      postal_code,
      contact_no,
      userFetchProfile,
      userCreateProfile,
    };
  },
};
</script>

<style>
</style>