<template>
  <Navigation />
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
        <!-- Side Navigation and Others Here -->
        <slot name="menu-content"></slot>
        <SideNav />
        <slot name="other-content"></slot>
      </div>
      <div class="col-md-10">
        <!-- Only Page Content here -->
        <slot name="page-content"></slot>
      </div>
    </div>
    <Footer></Footer>
  </div>
</template>

<script>
import Navigation from "./Navigation.vue";
import SideNav from "./partials/SideNav.vue";
import Footer from "./Footer.vue";
export default {
  components: {
    Navigation,
    SideNav,
    // AdvertiseCard,
    // Title,
    // Thumbnail,
    Footer,
  },
};
</script>

<style>
</style>