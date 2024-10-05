<template>
  <nav class="navbar navbar-light bg-light border-bottom border-info border-opacity-25">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img :src="'/images/go-bazzar-logo.png'" alt="Go Bazzar Logo" width="40" />
      </a>
    </div>
  </nav>
  <div class="d-flex" id="wrapper">
    <SideNav></SideNav>
    <div class="col-md-10">
      <div class="container-fluid">
        <slot name="page-content"></slot>
      </div>
    </div>
  </div>
</template>
  
  <script>
import SideNav from "./SideNav.vue";
export default {
  components: {
    SideNav,
  },
};
</script>
  
  <style>
</style>