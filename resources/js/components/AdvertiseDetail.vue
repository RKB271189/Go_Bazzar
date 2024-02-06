<template>
  <div class="row mt-3">
    <div class="col-md-7">
      <div class="row">
        <div class="col-md-9">
          <img
            :src="advertisement.thumb_nail"
            alt="Main Product Image"
            class="img-fluid adv-image-main"
            data-bs-toggle="modal"
            data-bs-target="#imageModal"
            @click="openImage(advertisement.thumb_nail, -1)"
          />
        </div>
        <div class="col-md-3 mt-md-0 mt-2">
          <div class="row">
            <div
              class="col-md-12 col-4"
              v-for="(image, index) in advertisement.image"
              :key="image.id"
              :class="index === 2 ? 'position-relative' : ''"
            >
              <img
                v-if="index < 3 && advertisement.image[index].image !== null"
                :src="advertisement.image[index].image"
                alt="Product Image 1"
                class="img-fluid adv-images-small"
                :class="index > 0 ? 'my-md-2 my-0' : ''"
                data-bs-toggle="modal"
                data-bs-target="#imageModal"
                @click="openImage(advertisement.image[index].image, index)"
              />
              <div v-if="index === 2 && advertisement.image[index].image !== null" class="image-overlay">
                <p>More Images</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-5">
      <div class="card">
        <div class="card-body">
          <h1 class="h2">{{ advertisement.title }}</h1>
          <p class="h3 py-2">${{ advertisement.price }}</p>
          <ul class="list-inline mb-0">
            <li class="list-inline-item">
              <h6>Name :</h6>
            </li>
            <li class="list-inline-item">
              <p class="text-muted">
                <strong>{{ advertisement.name }}</strong>
              </p>
            </li>
          </ul>
          <ul class="list-inline mb-0">
            <li class="list-inline-item">
              <h6>Type :</h6>
            </li>
            <li class="list-inline-item">
              <p class="text-muted"><strong>Auto</strong></p>
            </li>
          </ul>
          <ul class="list-inline mb-0">
            <li class="list-inline-item">
              <h6>Posted Date :</h6>
            </li>
            <li class="list-inline-item">
              <p class="text-muted">
                <strong>{{ advertisement.created_at }}</strong>
              </p>
            </li>
          </ul>
          <ul class="list-inline mb-0">
            <li class="list-inline-item">
              <h6>Contact :</h6>
            </li>
            <li class="list-inline-item">
              <p class="text-muted">
                <strong>{{ advertisement.contact_no }}</strong>
              </p>
            </li>
          </ul>
          <ul class="list-inline mb-0">
            <li class="list-inline-item">
              <h6>Address :</h6>
            </li>
            <li class="list-inline-item">
              <p class="text-muted">
                <strong>
                  {{ advertisement.address }}, {{ advertisement.city }},
                  {{ advertisement.province }} -
                  {{ advertisement.postal_code }}
                </strong>
              </p>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-2">
    <div class="col-12">
      <h5>Description :</h5>
      <p class="text-muted">
        <strong>{{ advertisement.description }}</strong>
      </p>
    </div>
  </div>
  <div
    class="modal fade"
    id="imageModal"
    tabindex="-1"
    aria-labelledby="imageModalLabel"
    aria-hidden="true"
    style="background-color: #313131"
  >
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-body text-center">
          <img
            :src="modalImages"
            alt="Modal Image"
            class="img-fluid"
            id="modalImage"
            style="top: 15%; position: relative"
          />
        </div>
        <button
          type="button"
          class="btn-close btn-close-white position-absolute top-0 m-3"
          data-bs-dismiss="modal"
          aria-label="Close"
          style="right: 5%"
        ></button>
        <button
          type="button"
          class="btn btn-light position-absolute top-50 start-0 translate-middle-y"
          id="prevButton"
          style="left: 8% !important"
          @click="previousImage"
        >
          <span class="fs-3">&lt;</span>
        </button>
        <button
          type="button"
          class="btn btn-light position-absolute top-50 end-0 translate-middle-y"
          id="nextButton"
          @click="nextImage"
          style="right: 8% !important"
        >
          <span class="fs-3">&gt;</span>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import { ref, computed } from "vue";
import { useStore } from "vuex";
export default {
  setup() {
    const store = useStore();
    const modalImages = ref("");
    const imageIndex = ref("");
    const openImage = (image, index) => {
      modalImages.value = image;
      imageIndex.value = index;
    };
    const advertisement = computed(() => store.getters["Bazzar/advertisement"]);
    const objImageLength = ref(0);
    //objImageLength.value = advertisement.value.image.length;
    const nextImage = () => {
      if (
        imageIndex.value >= -1 &&
        imageIndex.value < Object.keys(advertisement.value.image).length - 1
      ) {
        imageIndex.value = imageIndex.value + 1;
        modalImages.value = advertisement.value.image[imageIndex.value].image;
      }
    };
    const previousImage = () => {
      if (imageIndex.value >= -1) {
        imageIndex.value = imageIndex.value - 1;
        if (imageIndex.value === -1) {
          modalImages.value = advertisement.value.thumb_nail;
        } else {
          modalImages.value = advertisement.value.image[imageIndex.value].image;
        }
      }
    };
    return {
      modalImages,
      imageIndex,
      advertisement,
      objImageLength,
      openImage,
      nextImage,
      previousImage,
    };
  },
};
</script>

<style>
</style>