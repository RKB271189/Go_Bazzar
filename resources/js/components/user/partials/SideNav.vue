<template>
  <div class="row border-end border-bottom border-info border-opacity-25">
    <div class="col-12 d-flex align-items-center p-2">
      <div class="icon-container-sidebar me-2">
        <MegaphoneIcon class="hero-icon"></MegaphoneIcon>
      </div>
      <div>
        <router-link to="/advertisement/list" style="text-decoration: none"
          ><span class="m-0 d-block nav-link-sidebar"
            >Free Ads</span
          ></router-link
        >
        <span class="m-0 d-block quick-link-content"
          >Auto, Furniture and more</span
        >
      </div>
    </div>
    <div class="col-12 d-flex align-items-center p-2">
      <div class="icon-container-sidebar me-2">
        <WrenchScrewdriverIcon class="hero-icon"></WrenchScrewdriverIcon>
      </div>
      <div>
        <router-link :to="'/service/list'" style="text-decoration: none"
          ><span class="m-0 d-block nav-link-sidebar"
            >Services</span
          ></router-link
        >
        <span class="m-0 d-block quick-link-content"
          >Account, Finance and more</span
        >
      </div>
    </div>
    <div class="col-12 d-flex align-items-center p-2">
      <div class="icon-container-sidebar me-2">
        <PhoneArrowUpRightIcon class="hero-icon"></PhoneArrowUpRightIcon>
      </div>
      <div>
        <span class="m-0 d-block nav-link-sidebar">Business Directory</span>
        <span class="m-0 d-block quick-link-content"
          >Travel, Real Estate and more</span
        >
      </div>
    </div>
    <div class="col-12 d-flex align-items-center p-2">
      <div class="icon-container-sidebar me-2">
        <NewspaperIcon class="hero-icon"></NewspaperIcon>
      </div>
      <div>
        <span class="m-0 d-block nav-link-sidebar">News Paper</span>
        <span class="m-0 d-block quick-link-content"
          >Hindi, Gujarati and more</span
        >
      </div>
    </div>
    <!-- <div class="col-12 d-flex align-items-center p-2">
      <div class="icon-container-sidebar me-2">
        <BuildingStorefrontIcon class="hero-icon"></BuildingStorefrontIcon>
      </div>
      <div>
        <span class="m-0 d-block nav-link-sidebar">Market Place</span>
        <span class="m-0 d-block quick-link-content"
          >Events, Movies and more</span
        >
      </div>
    </div> -->
    <div class="col-12 d-flex align-items-center p-2">
      <div class="icon-container-sidebar me-2">
        <SparklesIcon class="hero-icon"></SparklesIcon>
      </div>
      <div>
        <span class="m-0 d-block nav-link-sidebar">Others</span>
        <span class="m-0 d-block quick-link-content"
          >Health, Education and more</span
        >
      </div>
    </div>
  </div>
</template>

<script>
import {
  MegaphoneIcon,
  PhoneArrowUpRightIcon,
  NewspaperIcon,
  WrenchScrewdriverIcon,
  BuildingStorefrontIcon,
  SparklesIcon,
} from "@heroicons/vue/24/outline";
export default {
  components: {
    MegaphoneIcon,
    PhoneArrowUpRightIcon,
    NewspaperIcon,
    WrenchScrewdriverIcon,
    BuildingStorefrontIcon,
    SparklesIcon,
  },
};
</script>

<style>
</style>