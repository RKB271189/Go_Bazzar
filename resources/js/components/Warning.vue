<template>
  <div class="row">
    <div class="col-md-12">
      <div class="alert alert-warning" role="alert">
        {{ message }}
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    message: String,
  },
};
</script>

<style>
</style>