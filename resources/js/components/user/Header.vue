<template>
  <div role="navigation">
    <div class="p-3 bg-light">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-lg-2 col-md-2 d-md-block header-content">
            <div class="header-left">
              <a href="https://gobazaar.ca">
                <img
                  class="header-logo-img"
                  :src="'/images/go-bazar-logo.webp'"
                />
              </a>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 text-end d-md-block mt-3 mt-md-0">
            <div class="input-group">
              <input class="form-control" placeholder="Search" />
              <span class="input-group-text bg-danger"
                ><MagnifyingGlassIcon
                  class="hero-icon-white"
                ></MagnifyingGlassIcon>
              </span>
            </div>
          </div>
          <div class="col-lg-2 col-md-2 mt-3 mt-md-0">
            <Social />
          </div>
          <div class="col-lg-3 col-md-3 mt-3 mt-md-0"></div>
          <div class="col-lg-1 col-md-1 mt-3 mt-md-0">
            <div class="row">
              <button class="btn btn-warning top-nav-buttons">
                <MicrophoneIcon class="hero-icon float-start"></MicrophoneIcon>
                Post Ads
              </button>
            </div>
            <div class="row mt-1">
              <button class="btn btn-danger top-nav-buttons">
                <ShieldExclamationIcon
                  class="hero-icon float-start"
                ></ShieldExclamationIcon>
                Report Scam
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="border-bottom border-top" id="subNavContainer">
      <Menu></Menu>
    </div>
    <!-- News Component Here -->
  </div>
</template>

<script>
import Menu from "./partials/Menu.vue";
import Social from "./partials/Social.vue";
import { MagnifyingGlassIcon } from "@heroicons/vue/24/outline";
import {
  MicrophoneIcon,
  ShieldExclamationIcon,
} from "@heroicons/vue/24/outline";
export default {
  components: {
    Menu,
    Social,
    MagnifyingGlassIcon,
    MicrophoneIcon,
    ShieldExclamationIcon,
  },
};
</script>

<style>
</style>