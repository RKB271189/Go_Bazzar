<template>
  <div class="border-end bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading border-bottom bg-warning">Go Bazzar</div>
    <div class="list-group list-group-flush">
      <router-link
        class="list-group-item list-group-item-action list-group-item-light p-3"
        to="/"
      >
        <span class="badge bg-success">
          <GlobeAltIcon class="hero-icon"></GlobeAltIcon>
        </span>
        Home
      </router-link>
      <router-link
        class="list-group-item list-group-item-action list-group-item-light p-3"
        to="/dashboard"
      >
        <span class="badge bg-success">
          <TableCellsIcon class="hero-icon"></TableCellsIcon>
        </span>
        Dashboard
      </router-link>
      <router-link
        class="list-group-item list-group-item-action list-group-item-light p-3"
        to="/profile"
      >
        <span class="badge bg-success">
          <UserGroupIcon class="hero-icon"></UserGroupIcon>
        </span>
        Profile
      </router-link>
      <router-link
        class="list-group-item list-group-item-action list-group-item-light p-3"
        to="/advertise"
      >
        <span class="badge bg-success">
          <MegaphoneIcon class="hero-icon"></MegaphoneIcon>
        </span>
        Advertise
      </router-link>
      <router-link
        class="list-group-item list-group-item-action list-group-item-light p-3"
        to="/list/other"
      >
        <span class="badge bg-success">
          <SparklesIcon class="hero-icon"></SparklesIcon>
        </span>
        Others
      </router-link>
      <a
        class="list-group-item list-group-item-action list-group-item-light p-3"
        href="#!"
      >
        <span class="badge bg-success">
          <DocumentDuplicateIcon class="hero-icon"></DocumentDuplicateIcon>
        </span>
        Blog
      </a>
      <a
        class="list-group-item list-group-item-action list-group-item-light p-3"
        href="#!"
      >
        <span class="badge bg-success">
          <CalendarDaysIcon class="hero-icon"></CalendarDaysIcon>
        </span>
        Events
      </a>
    </div>
  </div>
</template>
<script>
import { onMounted } from "vue";
import {
  GlobeAltIcon,
  TableCellsIcon,
  UserGroupIcon,
  MegaphoneIcon,
  SparklesIcon,
  DocumentDuplicateIcon,
  CalendarDaysIcon,
} from "@heroicons/vue/24/outline";
export default {
  components: {
    GlobeAltIcon,
    TableCellsIcon,
    UserGroupIcon,
    MegaphoneIcon,
    SparklesIcon,
    DocumentDuplicateIcon,
    CalendarDaysIcon,
  },
  setup() {
    const toggleSidebar = () => {
      document.body.classList.toggle("sb-sidenav-toggled");
      localStorage.setItem(
        "sb|sidebar-toggle",
        document.body.classList.contains("sb-sidenav-toggled")
      );
    };

    onMounted(() => {
      const sidebarToggle = document.body.querySelector("#sidebarToggle");
      if (sidebarToggle) {
        sidebarToggle.addEventListener("click", toggleSidebar);
      }
    });

    return {
      toggleSidebar,
    };
  },
};
</script>