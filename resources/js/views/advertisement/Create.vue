<template>
  <Toast :showToast="showToast" :message="message" :hasError="hasError"></Toast>
  <Loader v-if="loading"></Loader>
  <Layout v-else>
    <template v-slot:menu-content>
      <SideNav />
    </template>
    <template v-slot:page-content>
      <h4 class="mt-4">Create Your Advertisement Here</h4>
      <form @submit.prevent="userSaveAdvertise" enctype="multipart/form-data">
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
                v-model="expiry_date"
                type="date"
                class="form-control"
                name="expiry_date"
                id="expiry_date"
                autocomplete="off"
              />
              <label for="expiry_date" class="form-label">Expiry Date</label>
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
              <input
                type="file"
                class="form-control"
                name="thumb_nail"
                id="thumb_nail"
                autocomplete="off"
                ref="thumb_nail"
                @change="browseImage"
                v-bind:required="$route.params.id == 0"
              />
              <label for="thumb_nail" class="form-label">Thumb Nail</label>
            </div>
          </div>
        </div>
        <div class="row" v-if="auto">
          <div class="col-md-6">
            <div class="form-floating mb-3">
              <input
                v-model="auto_fields.model"
                type="text"
                class="form-control"
                name="model"
                id="model"
                autocomplete="off"
              />
              <label for="model" class="form-label">Model</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating mb-3">
              <input
                v-model="auto_fields.make"
                type="text"
                class="form-control"
                name="make"
                id="make"
                autocomplete="off"
              />
              <label for="make" class="form-label">Make</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6" v-if="auto">
            <div class="form-floating mb-3">
              <input
                v-model="auto_fields.year"
                type="text"
                class="form-control"
                name="year"
                id="year"
                autocomplete="off"
              />
              <label for="year" class="form-label">Year</label>
            </div>
          </div>
          <div class="col-md-6" v-if="rooms">
            <div class="form-floating mb-3">
              <select
                v-model="rooms_value"
                id="rooms"
                name="rooms"
                type="text"
                class="form-control"
              >
                <option
                  value=""
                  :selected="rooms_value === '' ? 'selected' : ''"
                >
                  Select
                </option>
                <option v-for="val in rooms_category" :value="val" :key="val">
                  {{ val }}
                </option>
              </select>
              <label for="rooms" class="form-label">Room Category</label>
            </div>
          </div>
          <div class="col-md-6" v-if="estate">
            <div class="form-floating mb-3">
              <select
                v-model="estate_value"
                id="estate"
                name="estate"
                type="text"
                class="form-control"
              >
                <option
                  value=""
                  :selected="estate_value === '' ? 'selected' : ''"
                >
                  Select
                </option>
                <option v-for="val in estates_category" :value="val" :key="val">
                  {{ val }}
                </option>
              </select>
              <label for="estate" class="form-label">Estate Category</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating mb-3">
              <input
                v-model="price"
                type="text"
                class="form-control"
                name="price"
                id="price"
                autocomplete="off"
              />
              <label for="price" class="form-label">Price</label>
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
          <div class="col-md-2" v-if="Object.keys(advertisement).length > 0">
            <div class="d-grid my-3">
              <button
                class="btn btn-danger btn-block"
                type="button"
                data-bs-toggle="modal"
                data-bs-target="#advertiseImage"
              >
                Upload Images
              </button>
            </div>
          </div>
        </div>
      </form>
      <div
        class="modal fade"
        id="advertiseImage"
        tabindex="-1"
        aria-labelledby="advertiseImage"
        aria-hidden="true"
      >
        <form @submit.prevent="uploadImages" enctype="multipart/form-data">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="advertiseImage">
                  Upload more images here
                </h1>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-floating mb-3">
                      <input
                        type="file"
                        class="form-control"
                        name="image1"
                        id="image1"
                        autocomplete="off"
                        ref="image1"
                        @change="browseOtherImage(0, $event)"
                        required
                      />
                      <label for="image1" class="form-label"
                        >Other images</label
                      >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-floating mb-3">
                      <input
                        type="file"
                        class="form-control"
                        name="image2"
                        id="image2"
                        autocomplete="off"
                        ref="image2"
                        @change="browseOtherImage(1, $event)"
                      />
                      <label for="image2" class="form-label"
                        >Other images</label
                      >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-floating mb-3">
                      <input
                        type="file"
                        class="form-control"
                        name="image3"
                        id="image3"
                        autocomplete="off"
                        ref="image3"
                        @change="browseOtherImage(2, $event)"
                      />
                      <label for="image3" class="form-label"
                        >Other images</label
                      >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-floating mb-3">
                      <input
                        type="file"
                        class="form-control"
                        name="image4"
                        id="image4"
                        autocomplete="off"
                        ref="image4"
                        @change="browseOtherImage(3, $event)"
                      />
                      <label for="image4" class="form-label"
                        >Other images</label
                      >
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button
                  type="submit"
                  class="btn btn-success"
                  :disabled="loading"
                >
                  Upload
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
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
    const expiry_date = ref("");
    const province_id = ref(0);
    const city_id = ref(0);
    const description = ref("");
    const address = ref("");
    const sub_category = computed(() => store.getters["User/sub_categories"]);
    const sub_category_id = ref(0);
    const thumb_nail = ref(null);
    const price = ref(0.0);
    const selected_thumb_nail = ref(null);
    const advertisement = computed(() => store.getters["User/advertisement"]);
    const rooms_category = computed(() => store.getters["User/rooms_category"]);
    const rooms_value = ref("");
    const estates_category = computed(
      () => store.getters["User/estates_category"]
    );
    const estate_value = ref("");
    const images = ref([null, null, null, null]);
    const auto = ref(false);
    const rooms = ref(false);
    const estate = ref(false);
    const auto_fields = ref({
      model: "",
      make: "",
      year: "",
    });
    onMounted(async () => {
      let id = route.params.id;
      await fetchAdvertiseRequires(id);
      populateAdvertisement();
    });
    const fetchAdvertiseRequires = async (id) => {
      await handleAPIRequest("User", "User/USER_FETCH_ADVERTISEMENT", {
        id: id,
      });
    };
    const populateAdvertisement = () => {
      title.value = advertisement.value.title;
      description.value = advertisement.value.description;
      address.value = advertisement.value.address;
      expiry_date.value = advertisement.value.expiry_date;
      province_id.value = advertisement.value.province_id;
      city_id.value = advertisement.value.city_id;
      sub_category_id.value = advertisement.value.sub_category_id;
      price.value = advertisement.value.price;
      if (advertisement.value.extras) {
        if (advertisement.value.extras.auto) {
          const auto_values = advertisement.value.extras.auto;
          auto.value = true;
          auto_fields.value.make = auto_values.make;
          auto_fields.value.year = auto_values.year;
          auto_fields.value.model = auto_values.model;
        } else if (advertisement.value.extras.rooms) {
          rooms.value = true;
          rooms_value.value = advertisement.value.extras.rooms.room_type;
        } else if (advertisement.value.extras.estate) {
          estate.value = true;
          estate_value.value = advertisement.value.extras.estate.estate_type;
        }
      }
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
      const selectedCategoryId = event.target.value;
      auto.value = false;
      rooms.value = false;
      estate.value = false;
      if (selectedCategoryId == 2) {
        auto.value = true;
      } else if (selectedCategoryId == 11) {
        rooms.value = true;
      } else if (selectedCategoryId == 9) {
        estate.value = true;
      }
    };
    const browseImage = () => {
      selected_thumb_nail.value = thumb_nail.value.files[0];
    };
    const browseOtherImage = (index, event) => {
      images.value[index] = event.target.files[0];
    };
    const userSaveAdvertise = async () => {
      let params = {
        id: route.params.id,
        title: title.value,
        expiry_date: expiry_date.value,
        description: description.value,
        address: address.value,
        sub_category_id: sub_category_id.value,
        province_id: province_id.value,
        city_id: city_id.value,
        price: price.value,
        thumb_nail: selected_thumb_nail.value,
      };
      if (auto.value == true) {
        params.extras = {
          auto: {
            model: auto_fields.value.model,
            make: auto_fields.value.make,
            year: auto_fields.value.year,
          },
        };
      } else if (rooms.value == true) {
        params.extras = {
          rooms: { room_type: rooms_value.value },
        };
      } else if (estate.value == true) {
        params.extras = {
          estate: { estate_type: estate_value.value },
        };
      }
      await handleAPIRequest("User", "User/USER_CREATE_ADVERTISEMENT", params);
      if (!hasError.value) {
        router.push("/create/advertise/" + advertisement.value.id);
      }
    };
    const uploadImages = async () => {
      let params = {
        advertisement_id: advertisement.value.id,
        images: images.value,
      };
      await handleAPIRequest(
        "User",
        "User/USER_UPLOAD_ADVERTISE_IMAGES",
        params
      );
      if (!hasError.value) {
        router.push("/advertise");
      }
    };
    return {
      loading,
      showToast,
      message,
      hasError,
      status,
      title,
      expiry_date,
      province_id,
      city_id,
      description,
      address,
      province,
      filteredCity,
      sub_category_id,
      sub_category,
      price,
      auto,
      rooms,
      estate,
      auto_fields,
      thumb_nail,
      advertisement,
      rooms_category,
      rooms_value,
      estates_category,
      estate_value,
      changeProvince,
      changeCategory,
      browseImage,
      userSaveAdvertise,
      browseOtherImage,
      uploadImages,
    };
  },
};
</script>
  
  <style>
</style>