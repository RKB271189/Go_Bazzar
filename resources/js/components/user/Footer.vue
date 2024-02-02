<template>
  <div class="row border mt-2">
    <footer class="text-center text-lg-start bg-body-tertiary text-muted">
      <div class="container-fluid text-center text-md-start mt-2">
        <div class="row mt-1">
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold mb-3">
              <Square3Stack3DIcon class="hero-icon pb-1"></Square3Stack3DIcon>
              Go Bazzar
            </h6>
            <p>
              Here you can use rows and columns to organize your footer content.
              Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            </p>
          </div>
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold mb-3">Products</h6>
            <span class="text-muted d-block">
              <a href="#!" class="text-reset text-decoration-none">Angular</a>
            </span>
            <span class="text-muted d-block mt-1">
              <a href="#!" class="text-reset text-decoration-none">React</a>
            </span>
            <span class="text-muted d-block mt-1">
              <a href="#!" class="text-reset text-decoration-none">Vue</a>
            </span>
            <span class="text-muted d-block mt-1">
              <a href="#!" class="text-reset text-decoration-none">Laravel</a>
            </span>
          </div>
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold mb-3">Useful links</h6>
            <span class="text-muted d-block">
              <a href="#!" class="text-reset text-decoration-none">Pricing</a>
            </span>
            <span class="text-muted d-block mt-1">
              <a href="#!" class="text-reset text-decoration-none">Settings</a>
            </span>
            <span class="text-muted d-block mt-1">
              <a href="#!" class="text-reset text-decoration-none">Orders</a>
            </span>
            <span class="text-muted d-block mt-1">
              <a href="#!" class="text-reset text-decoration-none">Help</a>
            </span>
          </div>
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <h6 class="text-uppercase fw-bold mb-3">Contact</h6>
            <p>
              <MapIcon class="hero-icon-small"></MapIcon> New York, NY 10012, US
            </p>
            <p>
              <EnvelopeIcon class="hero-icon-small"></EnvelopeIcon>
              info@example.com
            </p>
            <p>
              <PhoneIcon class="hero-icon-small"></PhoneIcon> + 01 234 567 88
            </p>
          </div>
        </div>
      </div>
      <div class="text-center p-4 bg-success text-white">
        © 2024 Copyright:
        <router-link class="text-reset fw-bold" to="/">Go Bazzar</router-link>
      </div>
    </footer>
  </div>
</template>

<script>
import {
  EnvelopeIcon,
  PhoneIcon,
  MapIcon,
  Square3Stack3DIcon,
} from "@heroicons/vue/24/outline";
export default {
  components: {
    EnvelopeIcon,
    PhoneIcon,
    MapIcon,
    Square3Stack3DIcon,
  },
};
</script>

<style>
</style>