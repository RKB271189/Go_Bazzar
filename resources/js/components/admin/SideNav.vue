<template>
  <div class="col-md-2 border-end border-bottom border-info border-opacity-25">
    <div class="list-group list-group-flush">
      <!-- <router-link
        class="list-group-item list-group-item-action list-group-item-light p-3"
        to="/dashboard"
      >
        <span class="badge bg-success">
          <TableCellsIcon class="hero-icon"></TableCellsIcon>
        </span>
        Dashboard
      </router-link> -->
      <router-link
        class="list-group-item list-group-item-action list-group-item-light p-2"
        style="border-bottom: unset"
        to="/admin/dashboard"
      >
        <span class="badge bg-warning">
          <TableCellsIcon class="hero-icon"></TableCellsIcon>
        </span>
        Dashboard
      </router-link>
      <router-link
        class="list-group-item list-group-item-action list-group-item-light p-2"
        style="border-bottom: unset"
        to="/admin/roles"
      >
        <span class="badge bg-warning">
          <BuildingLibraryIcon class="hero-icon"></BuildingLibraryIcon>
        </span>
        Roles & Permissions
      </router-link>
      <router-link
        class="list-group-item list-group-item-action list-group-item-light p-2"
        style="border-bottom: unset"
        to="/admin/advertise"
      >
        <span class="badge bg-warning">
          <MegaphoneIcon class="hero-icon"></MegaphoneIcon>
        </span>
        Advertise
      </router-link>
      <router-link
        class="list-group-item list-group-item-action list-group-item-light p-2"
        to="/admin/other"
        style="border-bottom: unset"
      >
        <span class="badge bg-warning">
          <SparklesIcon class="hero-icon"></SparklesIcon>
        </span>
        Others
      </router-link>
      <a
        class="list-group-item list-group-item-action list-group-item-light p-2"
        @click="userLogout"
        style="cursor: pointer"
      >
        <span class="badge bg-danger">
          <ArrowLeftStartOnRectangleIcon
            class="hero-icon"
          ></ArrowLeftStartOnRectangleIcon>
        </span>
        Logout
      </a>
      <!-- <a
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
      </a> -->
    </div>
  </div>
</template>
  <script>
import { onMounted } from "vue";
import { useRouter } from "vue-router";
import {
  GlobeAltIcon,
  TableCellsIcon,
  UserGroupIcon,
  MegaphoneIcon,
  SparklesIcon,
  DocumentDuplicateIcon,
  CalendarDaysIcon,
  ArrowLeftStartOnRectangleIcon,
  BuildingLibraryIcon,
} from "@heroicons/vue/24/outline";
import useAPIRequest from "../../services/api-request";
import accessLocalStorage from "../../services/local-storage";
export default {
  components: {
    // Loader,
    // Toast,
    GlobeAltIcon,
    TableCellsIcon,
    UserGroupIcon,
    MegaphoneIcon,
    SparklesIcon,
    DocumentDuplicateIcon,
    CalendarDaysIcon,
    BuildingLibraryIcon,
    ArrowLeftStartOnRectangleIcon,
  },
  setup() {
    const router = useRouter();
    const { removeLocalStorage } = accessLocalStorage();
    const { hasError, message, loading, showToast, handleAPIRequest } =
      useAPIRequest();
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
    const userLogout = async () => {
      await handleAPIRequest("Auth", "Auth/USER_LOGOUT");
      if (!hasError.value) {
        removeLocalStorage("passport-token");
        //showAccount();
        router.push("/");
      }
    };

    return {
      loading,
      showToast,
      message,
      hasError,
      toggleSidebar,
      userLogout,
    };
  },
};
</script>