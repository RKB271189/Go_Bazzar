<template>
  <Header />
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
        <!-- Side Navigation and Others Here -->
        <slot name="advertise-nav"></slot>
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
import Header from "./Header.vue";
import SideNav from "./partials/SideNav.vue";
import Footer from "./Footer.vue";
export default {
  components: {
    SideNav,
    Footer,
    Header,
  },
};
</script>

<style>
</style>