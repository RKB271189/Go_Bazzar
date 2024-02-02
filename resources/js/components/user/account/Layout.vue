<template>
  <div class="d-flex" id="wrapper">
    <SideNav></SideNav>
    <div id="page-content-wrapper">
      <Header></Header>
      <div class="container-fluid">
        <slot name="page-content"></slot>
      </div>
    </div>
  </div>
</template>

<script>
import SideNav from "./SideNav.vue";
import Header from "./Header.vue";
export default {
  components: {
    SideNav,
    Header,
  },
};
</script>

<style>
</style>