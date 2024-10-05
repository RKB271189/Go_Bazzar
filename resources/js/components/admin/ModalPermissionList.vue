<template>
  <div
    class="modal fade"
    id="ModalPermissionList"
    data-bs-backdrop="static"
    data-bs-keyboard="false"
    tabindex="-1"
    aria-labelledby="PermissionListModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="PermissionListModalLabel">
            Assign Permission to Role
          </h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <div class="mb-3">
              <label for="permission_name" class="form-label">Route List</label>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col"></th>
                    <th scope="col">Route</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="(permission, index) in permissionList"
                    :key="permission.id"
                  >
                    <th scope="row">{{ index + 1 }}</th>
                    <th scope="row">
                      <input
                        type="checkbox"
                        @change="checkUncheckPermission($event, permission.id)"
                        :checked="permission.checked"
                      />
                    </th>
                    <td>{{ permission.name }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-secondary"
            data-bs-dismiss="modal"
          >
            Close
          </button>
          <button
            type="button"
            class="btn btn-primary"
            @click="assignPermission"
          >
            Assign
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
    
    <script>
import { computed, onMounted, ref } from "vue";
import { useStore } from "vuex";
import { Modal } from "bootstrap";
import useAPIRequest from "../../services/api-request";
export default {
  setup(props, { emit, expose }) {
    const store = useStore();
    const { handleAPIRequest } = useAPIRequest();
    const roleId = ref(null);
    let permissionModalList = null;
    const arrPermissionList = computed(() =>
      store.state.Roles.permissionWithChecked
        .filter((permission) => {
          return permission.checked;
        })
        .map((permission) => {
          return permission.id;
        })
    );
    const permissionList = computed(
      () => store.state.Roles.permissionWithChecked
    );
    onMounted(async () => {
      const permissionModalEl = document.getElementById("ModalPermissionList");
      permissionModalList = new Modal(permissionModalEl);
    });
    const checkUncheckPermission = (event, id) => {
      console.log(arrPermissionList.value);
      if (event.target.checked) {
        arrPermissionList.value.push(id);
      } else {
        let index = arrPermissionList.value.indexOf(id);
        if (index > -1) {
          arrPermissionList.value.splice(index, 1);
        }
      }
    };
    const assignPermission = () => {
      emit("assignPermission", arrPermissionList.value, roleId.value);
    };
    const showModal = async (id) => {
      roleId.value = id;
      await getRolePermissions();
      permissionModalList.show();
    };

    const hideModal = () => {
      permissionModalList.hide();
    };
    const getRolePermissions = async () => {
      await handleAPIRequest(
        "Roles",
        "Roles/GET_ROLE_PERMISSIONS",
        roleId.value
      );
    };
    expose({ hideModal, showModal });
    return {
      permissionList,
      checkUncheckPermission,
      assignPermission,
      showModal,
      hideModal,
    };
  },
};
</script>
    
    <style>
</style>