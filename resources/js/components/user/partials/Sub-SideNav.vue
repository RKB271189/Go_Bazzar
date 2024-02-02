<template>
  <div class="row border-end border-bottom border-info border-opacity-25">
    <div class="col-12 d-flex align-items-center p-2">
      <div class="icon-container-sidebar bg-danger me-2">
        <PaperAirplaneIcon class="hero-icon"></PaperAirplaneIcon>
      </div>
      <div>
        <span class="m-0 d-block nav-link-sidebar text-danger">Travels</span>
        <span class="m-0 d-block quick-link-content"
          >Events, Movies and more</span
        >
      </div>
    </div>
    <div class="col-12 d-flex align-items-center p-2">
      <div class="icon-container-sidebar bg-danger me-2">
        <BriefcaseIcon class="hero-icon"></BriefcaseIcon>
      </div>
      <div>
        <span class="m-0 d-block nav-link-sidebar text-danger">Bussiness</span>
        <span class="m-0 d-block quick-link-content"
          >Events, Movies and more</span
        >
      </div>
    </div>
    <div class="col-12 d-flex align-items-center p-2">
      <div class="icon-container-sidebar bg-danger me-2">
        <BuildingOffice2Icon class="hero-icon"></BuildingOffice2Icon>
      </div>
      <div>
        <span class="m-0 d-block nav-link-sidebar text-danger"
          >Real Estate</span
        >
        <span class="m-0 d-block quick-link-content"
          >Events, Movies and more</span
        >
      </div>
    </div>
  </div>
</template>

<script>
import {
  PaperAirplaneIcon,
  BriefcaseIcon,
  BuildingOffice2Icon,
} from "@heroicons/vue/24/outline";
export default {
  components: {
    PaperAirplaneIcon,
    BriefcaseIcon,
    BuildingOffice2Icon,
  },
};
</script>

<style>
</style>