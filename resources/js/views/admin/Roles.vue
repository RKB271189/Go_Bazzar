<template>
  <Loader v-if="loading"></Loader>
  <Toast :showToast="showToast" :message="message" :hasError="hasError"></Toast>
  <Layout>
    <template v-slot:page-content>
      <ModalRole @createRole="createRole" ref="roleCreateModal" />
      <ModalPermission
        @createPermission="createPermission"
        ref="permissionCreateModal"
      />
      <ModalPermissionList
        @assignPermission="assignPermission"
        ref="permissionListModal"
        :permissions="permissions"
      />
      <h4 class="mt-4">Role List</h4>
      <div class="row">
        <div class="col-md-12">
          <button
            class="btn btn-primary float-end"
            data-bs-toggle="modal"
            data-bs-target="#ModalRole"
          >
            Create
          </button>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
                <th scope="col">Action</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(role, index) in roles" :key="role.id">
                <th scope="row">{{ index + 1 }}</th>
                <td>{{ role.name }}</td>
                <td>{{ role.created_at }}</td>
                <td>{{ role.updated_at }}</td>
                <td>
                  <PencilSquareIcon class="hero-icon"></PencilSquareIcon>
                  <TrashIcon class="hero-icon ms-3"></TrashIcon>
                </td>
                <td>
                  <button
                    class="btn btn-success"
                    @click="showPermissionList(role.id)"
                  >
                    Assign
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <h4 class="mt-4">Permission List</h4>
      <div class="row">
        <div class="col-md-12">
          <button
            class="btn btn-primary float-end"
            data-bs-toggle="modal"
            data-bs-target="#ModalPermission"
          >
            Create
          </button>
        </div>
      </div>
      <div class="row">
        <div class="row">
          <div class="col-md-6">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Route</th>
                  <th scope="col">Created</th>
                  <th scope="col">Updated</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="(permission, index) in permissions"
                  :key="permission.id"
                >
                  <th scope="row">{{ index + 1 }}</th>
                  <td>{{ permission.name }}</td>
                  <td>{{ permission.created_at }}</td>
                  <td>{{ permission.updated_at }}</td>
                  <td>
                    <PencilSquareIcon class="hero-icon"></PencilSquareIcon>
                    <TrashIcon class="hero-icon ms-3"></TrashIcon>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </template>
  </Layout>
</template>
      
      <script>
import Layout from "../../components/admin/Layout.vue";
import ModalRole from "../../components/admin/ModalRole.vue";
import ModalPermission from "../../components/admin/ModalPermission.vue";
import ModalPermissionList from "../../components/admin/ModalPermissionList.vue";
import { ref, onMounted, computed } from "vue";
import Loader from "../../components/Loader.vue";
import Toast from "../../components/Toast.vue";
import useAPIRequest from "../../services/api-request";
import { useStore } from "vuex";
import moment from "moment";
import { PencilSquareIcon, TrashIcon } from "@heroicons/vue/24/outline";
export default {
  components: {
    Loader,
    Toast,
    Layout,
    ModalRole,
    ModalPermission,
    ModalPermissionList,
    PencilSquareIcon,
    TrashIcon,
  },
  setup() {
    const store = useStore();
    const { hasError, message, loading, showToast, handleAPIRequest } =
      useAPIRequest();
    const roleCreateModal = ref(null);
    const permissionCreateModal = ref(null);
    const permissionListModal = ref(null);
    const roles = computed(() =>
      store.state.Roles.roles.map(function (role) {
        return {
          id: role.id,
          name: role.name,
          created_at: moment(String(role.created_at)).format("DD-MM-YYYY"),
          updated_at: moment(String(role.updated_at)).format("DD-MM-YYYY"),
        };
      })
    );

    const permissions = computed(() =>
      store.state.Permissions.permissions.map(function (permission) {
        return {
          id: permission.id,
          name: permission.name,
          created_at: moment(String(permission.created_at)).format(
            "DD-MM-YYYY"
          ),
          updated_at: moment(String(permission.updated_at)).format(
            "DD-MM-YYYY"
          ),
        };
      })
    );

    onMounted(() => {
      getRolesandPermissions();
    });
    const getRolesandPermissions = async () => {
      await handleAPIRequest("Roles", "Roles/GET_ROLES");
      await handleAPIRequest("Permissions", "Permissions/GET_PERMISSIONS");
    };
    const createRole = async (name) => {
      await handleAPIRequest("Roles", "Roles/CREATE_ROLE", {
        name: name,
      });
      if (!hasError.value) {
        roleCreateModal.value.hideModal();
        getRolesandPermissions();
      }
    };
    const createPermission = async (name) => {
      await handleAPIRequest("Permissions", "Permissions/CREATE_PERMISSION", {
        name: name,
      });
      if (!hasError.value) {
        permissionCreateModal.value.hideModal();
        getRolesandPermissions();
      }
    };
    const showPermissionList = async (id) => {
      loading.value = true;
      await permissionListModal.value.showModal(id);
      loading.value = false;
    };
    const assignPermission = async (arrPermissionList, roleId) => {
      handleAPIRequest("Roles", "Roles/ASSIGN_ROLE_PERMISSIONS", {
        permissionList: arrPermissionList,
        id: roleId,
      });
      if (!hasError.value) {
        permissionListModal.value.hideModal();
      }
    };
    return {
      loading,
      showToast,
      message,
      hasError,
      roles,
      permissions,
      getRolesandPermissions,
      createRole,
      roleCreateModal,
      showPermissionList,
      createPermission,
      permissionCreateModal,
      permissionListModal,
      assignPermission,
    };
  },
};
</script>
      
      <style>
</style>