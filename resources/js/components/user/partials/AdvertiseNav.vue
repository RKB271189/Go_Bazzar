<template>
  <div class="row border-end border-bottom border-info border-opacity-25">
    <div
      class="accordion accordion-flush"
      id="freeAds"
      style="margin-left: -20px"
    >
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button
            class="accordion-button collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#flush-collapseOne"
            aria-expanded="false"
            aria-controls="flush-collapseOne"
            style="box-shadow: unset; background-color: unset"
          >
            <div class="icon-container-sidebar bg-danger me-2">
              <FunnelIcon class="hero-icon"></FunnelIcon>
            </div>
            {{ mainname }}
          </button>
        </h2>
        <div
          id="flush-collapseOne"
          class="accordion-collapse collapse"
          data-bs-parent="#freeAds"
        >
          <div class="accordion-body">
            <ul class="list-group">
              <li
                class="list-group-item"
                v-for="val in subcategories"
                :key="val.id"
                style="font-size: 14px"
              >
                <a
                  class="text-decoration-none"
                  @click="$emit('changeCategoryType')"
                  style="cursor: pointer"
                >
                  {{ val.name }}</a
                >
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { FunnelIcon } from "@heroicons/vue/24/outline";
export default {
  props: {
    mainname: String,
    subcategories: Object,
    linktype: String,
  },
  components: {
    FunnelIcon,
  },
};
</script>

<style>
</style>