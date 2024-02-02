<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container-fluid">
      <button class="btn btn-danger" id="sidebarToggle">
        <Bars4Icon class="hero-icon"></Bars4Icon>
      </button>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
          <!-- <li class="nav-item active"><a class="nav-link" href="#!">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="#!">Link</a></li> -->
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              id="navbarDropdown"
              href="#"
              role="button"
              data-bs-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
              style="color: black !important"
            >
              <Cog8ToothIcon class="hero-icon"></Cog8ToothIcon>
            </a>
            <div
              class="dropdown-menu dropdown-menu-end"
              aria-labelledby="navbarDropdown"
            >
              <!-- <a class="dropdown-item" href="#!">Action</a> -->
              <a class="dropdown-item" href="#!">Settings</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#!">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
import { Bars4Icon, Cog8ToothIcon } from "@heroicons/vue/24/outline";
export default {
  components: {
    Bars4Icon,
    Cog8ToothIcon,
  },
};
</script>

<style>
</style>