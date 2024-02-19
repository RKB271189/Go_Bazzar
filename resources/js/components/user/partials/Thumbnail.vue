<template>
  <div
    class="col-md-3"
    v-for="(val, index) in quickadveritsements"
    :key="index"
  >
    <div class="position-relative">
      <img :src="val.image" class="img-thumbnail advertise-image" alt="..." />
      <div
        class="position-absolute top-50 start-50 translate-middle text-container"
      >
        <router-link class="btn btn-primary" :to="val.link">{{
          val.name
        }}</router-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    quickadveritsements: Object,
  },
};
</script>

<style>
</style>