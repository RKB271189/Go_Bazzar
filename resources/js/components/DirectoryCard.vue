<template>
  <div class="row p-2">
    <div class="col-md-3 shadow mb-2">
      <div class="row p-0 m-0">
        <div class="col-12">
          <div class="card">
            <img :src="'/images/travel.jpg'" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title main-ads-title">Shree Hari Travels</h5>
              <!-- <p class="card-text text-mute">
                Some quick example text to build on the card title and make up
                the bulk of the card's content.
              </p> -->
            </div>
          </div>
        </div>
      </div>
      <div class="row p-0 m-0 mt-1">
        <div class="col-12">
          <div
            class="alert alert-danger d-flex justify-content-between"
            role="alert"
          >
            <span class="m-0 text-danger"
              ><PhoneIcon class="hero-icon-small pb-1"></PhoneIcon> 3065107099
            </span>
            <span class="m-0 text-danger">
              <MapPinIcon class="hero-icon-small pb-1 ms-2"></MapPinIcon>
              Regina, SK
            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 shadow mb-2">
      <div class="row p-0 m-0">
        <div class="col-12">
          <div class="card">
            <img :src="'/images/travel.jpg'" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title main-ads-title">Shree Hari Travels</h5>
              <!-- <p class="card-text text-mute">
                Some quick example text to build on the card title and make up
                the bulk of the card's content.
              </p> -->
            </div>
          </div>
        </div>
      </div>
      <div class="row p-0 m-0 mt-1">
        <div class="col-12">
          <div
            class="alert alert-danger d-flex justify-content-between"
            role="alert"
          >
            <span class="m-0 text-danger"
              ><PhoneIcon class="hero-icon-small pb-1"></PhoneIcon> 3065107099
            </span>
            <span class="m-0 text-danger">
              <MapPinIcon class="hero-icon-small pb-1 ms-2"></MapPinIcon>
              Regina, SK
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <div class="row ps-4">
    <div class="col-md-3 ms-0 ms-md-2 mt-0 mt-md-2 d-flex directory-card-md-main border-success">
      <div class="row">
        <div class="col-md-3 text-center directory-logo-bg directory-card-4-md">
          <img
            :src="'/images/logo-realestate.avif'"
            class="mx-auto directory-logo-img border-success"
          />
        </div>
        <div class="col-md-9 text-center">
          <h6 class="card-title main-ads-title">Shree Hari Real Estate</h6>
          <span class="m-0 d-block quick-link-content pt-2"
            >Dealing in all type of real estate business</span
          >
          <div class="row pt-2">
            <span class="m-0 quick-link-content inline-block"
              ><PhoneIcon class="hero-icon-small pb-1"></PhoneIcon> 3065107099
              <MapPinIcon class="hero-icon-small pb-1 ms-2"></MapPinIcon>
              Regina, SK
            </span>
          </div>
        </div>
      </div>
    </div>
    <div
      class="col-md-3 d-flex directory-card-md-main ms-0 ms-md-2 mt-0 mt-md-2 border-danger"
    >
      <div class="row">
        <div
          class="col-md-3 text-center bg-danger directory-card-4-md"
          style="background-color: rgb(219, 114, 114) !important"
        >
          <img
            :src="'/images/logo-realestate.avif'"
            class="mx-auto directory-logo-img border-danger"
          />
        </div>
        <div class="col-md-9 text-center">
          <h6 class="card-title main-ads-title">Shree Hari Real Estate</h6>
          <span class="m-0 d-block quick-link-content pt-2"
            >Dealing in all type of real estate business</span
          >
          <div class="row pt-2">
            <span class="m-0 quick-link-content inline-block"
              ><PhoneIcon class="hero-icon-small pb-1"></PhoneIcon> 3065107099
              <MapPinIcon class="hero-icon-small pb-1 ms-2"></MapPinIcon>
              Regina, SK
            </span>
          </div>
        </div>
      </div>
    </div>
  </div> -->
</template>

<script>
import {
  PaperAirplaneIcon,
  PhoneIcon,
  MapPinIcon,
} from "@heroicons/vue/24/outline";
export default {
  components: {
    PaperAirplaneIcon,
    PhoneIcon,
    MapPinIcon,
  },
};
</script>

<style>
</style>