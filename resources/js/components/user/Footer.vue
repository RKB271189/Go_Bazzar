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
              Join us in cultivating a thriving community where meaningful
              connections are made, entrepreneurial endeavors flourish, and
              opportunities for collaboration abound. Explore a marketplace that
              goes beyond transactions, offering a space for genuine
              interactions and the exchange of ideas.
            </p>
          </div>
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold mb-3">Quick Links</h6>
            <span class="text-muted d-block">
              <router-link
                to="/advertisement/list"
                class="text-reset text-decoration-none"
                >Free Ads</router-link
              >
            </span>
            <span class="text-muted d-block mt-1">
              <router-link
                to="/service/list"
                class="text-reset text-decoration-none"
                >Services</router-link
              >
            </span>
            <span class="text-muted d-block mt-1">
              <router-link
                to="/business/list"
                class="text-reset text-decoration-none"
                >Business</router-link
              >
            </span>
            <span class="text-muted d-block mt-1">
              <router-link
                to="/newspaper/list"
                class="text-reset text-decoration-none"
                >News Paper</router-link
              >
            </span>
            <span class="text-muted d-block mt-1">
              <router-link
                to="/others/list"
                class="text-reset text-decoration-none"
                >Others</router-link
              >
            </span>
          </div>
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold mb-3">Useful links</h6>
            <span class="text-muted d-block">
              <router-link
                to="/advertisement/autos"
                class="text-reset text-decoration-none"
                >Ads - Auto</router-link
              >
            </span>
            <span class="text-muted d-block mt-1">
              <router-link
                to="/services/home-food"
                class="text-reset text-decoration-none"
                >Services - Home Food</router-link
              >
            </span>
            <span class="text-muted d-block mt-1">
              <router-link
                to="/terms-policy"
                class="text-reset text-decoration-none"
                >Terms & Policy</router-link
              >
            </span>
            <span class="text-muted d-block mt-1">
              <router-link
                to="/agreements"
                class="text-reset text-decoration-none"
                >Agreements</router-link
              >
            </span>
          </div>
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <h6 class="text-uppercase fw-bold mb-3">Contact</h6>
            <p><MapIcon class="hero-icon-small"></MapIcon> 2830 Gordon Road</p>
            <p>
              <EnvelopeIcon class="hero-icon-small"></EnvelopeIcon>
              info@gobazzar.com
            </p>
            <p>
              <PhoneIcon class="hero-icon-small"></PhoneIcon> +1 306 510 7099
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