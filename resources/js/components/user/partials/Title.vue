<template>
  <div class="row d-flex">
    <div class="col-12 d-flex justify-content-between align-items-center">
      <h5 class="ms-1 small-section-title">{{ heading }}</h5>
      <a href="#" class="btn btn-link">
        View More
        <ChevronDoubleRightIcon
          class="hero-icon-small"
        ></ChevronDoubleRightIcon>
      </a>
    </div>
  </div>
</template>

<script>
import { ChevronDoubleRightIcon } from "@heroicons/vue/24/outline";
export default {
  props: {
    heading: {
      type: String,
      default: "",
    },
  },
  components: {
    ChevronDoubleRightIcon,
  },
};
</script>

<style>
</style>