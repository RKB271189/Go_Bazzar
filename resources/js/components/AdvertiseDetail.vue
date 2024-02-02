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
          />
        </div>
        <div class="col-md-3 mt-md-0 mt-2">
          <div class="row">
            <div class="col-md-12 col-4">
              <img
                :src="advertisement.image[0].image"
                alt="Product Image 1"
                class="img-fluid adv-images-small"
              />
            </div>
            <div class="col-md-12 col-4">
              <img
                :src="advertisement.image[1].image"
                alt="Product Image 1"
                class="img-fluid adv-images-small my-md-2 my-0"
              />
            </div>
            <div class="col-md-12 col-4 position-relative">
              <img
                :src="advertisement.image[2].image"
                alt="Product Image 1"
                class="img-fluid adv-images-small my-md-2 my-0"
              />
              <div class="image-overlay">
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
            :src="'/images/car-1.webp'"
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
        >
          <span class="fs-3">&lt;</span>
        </button>
        <button
          type="button"
          class="btn btn-light position-absolute top-50 end-0 translate-middle-y"
          id="nextButton"
          style="right: 8% !important"
        >
          <span class="fs-3">&gt;</span>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    advertisement: Object,
  },
};
</script>

<style>
</style>