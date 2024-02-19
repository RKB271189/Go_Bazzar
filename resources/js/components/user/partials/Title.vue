<template>
  <div class="row d-flex">
    <div class="col-12 d-flex justify-content-between align-items-center">
      <h5 class="ms-1 small-section-title">{{ heading }}</h5>
      <router-link v-if="viewmore" :to="linkto" class="btn btn-link">
        View More
        <ChevronDoubleRightIcon
          class="hero-icon-small"
        ></ChevronDoubleRightIcon>
      </router-link>
    </div>
  </div>
</template>

<script>
import { ChevronDoubleRightIcon } from "@heroicons/vue/24/outline";
export default {
  props: {
    heading: String,
    linkto: String,
    viewmore: Boolean,
  },
  components: {
    ChevronDoubleRightIcon,
  },
};
</script>

<style>
</style>