<template>
  <div class="col-md-6" v-for="val in business" :key="val.id">
    <div class="card p-2">
      <div class="row">
        <div class="col-md-4">
          <img :src="'/images/travel.jpg'" class="card-img-top" alt="..." />
        </div>
        <div class="col-md-4 border-end">
          <h4>{{ val.title }}</h4>
          <p class="mb-0 text-muted mt-2">
            Address : {{ val.address }}, {{ val.city }} ,
            {{ val.province }}
          </p>
        </div>
        <div class="col-md-4 border-start">
          <p class="mb-0 text-muted">Contact No : {{ val.business_no }}</p>
          <p class="mb-0 text-muted">Email : {{ val.business_email }}</p>
          <p class="mb-0 text-muted">Category : {{ val.sub_category }}</p>
          <p class="mb-0 text-muted">
            Sub Category : {{ val.sub_sub_category }}
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {
  PaperAirplaneIcon,
  PhoneIcon,
  MapPinIcon,
} from "@heroicons/vue/24/outline";
export default {
  props: {
    business: Object,
  },
  components: {
    PaperAirplaneIcon,
    PhoneIcon,
    MapPinIcon,
  },
};
</script>

<style>
</style>