<template>
  <div class="row border-end border-bottom border-info border-opacity-25">
    <div
      class="accordion accordion-flush"
      style="margin-left: -20px"
      v-for="(val1, index) in subcategories"
      :key="val1.id"
      :id="'businessNav' + val1.id"
    >
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button
            class="accordion-button collapsed"
            type="button"
            data-bs-toggle="collapse"
            :data-bs-target="'#flush-collapse' + val1.id"
            aria-expanded="false"
            :aria-controls="'flush-collapse' + val1.id"
            style="box-shadow: unset; background-color: unset"
          >
            <div class="icon-container-sidebar bg-danger me-2">
              <PaperAirplaneIcon
                v-if="index === 0"
                class="hero-icon"
              ></PaperAirplaneIcon>
              <BriefcaseIcon
                v-if="index === 1"
                class="hero-icon"
              ></BriefcaseIcon>
              <BuildingOffice2Icon
                v-if="index === 2"
                class="hero-icon"
              ></BuildingOffice2Icon>
            </div>
            {{ val1.name }}
          </button>
        </h2>
        <div
          :id="'flush-collapse' + val1.id"
          class="accordion-collapse collapse"
          :data-bs-parent="'#businessNav' + val1.id"
        >
          <div class="accordion-body">
            <ul class="list-group">
              <li
                class="list-group-item"
                v-for="val2 in val1.subsubcategory"
                :key="val2.id"
              >
                {{ val2.name }}
              </li>
            </ul>
          </div>
        </div>
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
  props: {
    subcategories: Object,
  },
  components: {
    PaperAirplaneIcon,
    BriefcaseIcon,
    BuildingOffice2Icon,
  },
};
</script>

<style>
</style>