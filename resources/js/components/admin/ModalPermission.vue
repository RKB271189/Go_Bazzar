<template>
  <div
    class="modal fade"
    id="ModalPermission"
    data-bs-backdrop="static"
    data-bs-keyboard="false"
    tabindex="-1"
    aria-labelledby="PermissionModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="PermissionModalLabel">
            Create/Update Permission
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
              <label for="permission_name" class="form-label">Route Name</label>
              <input
                type="text"
                class="form-control"
                id="permission_name"
                v-model="name"
                required
              />
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
            @click="createPermission"
          >
            Create
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
  
  <script>
import { onMounted, ref } from "vue";
import { Modal } from "bootstrap";
export default {
  setup(props, { emit, expose }) {
    const name = ref(null);
    let permissionModalInstance = null;
    onMounted(async () => {
      const permissionModalEl = document.getElementById("ModalPermission");
      permissionModalInstance = new Modal(permissionModalEl);
    });
    const createPermission = () => {
      emit("createPermission", name.value);
    };

    const hideModal = () => {
      permissionModalInstance.hide();
    };
    expose({ hideModal });
    return {
      name,
      createPermission,
      hideModal,
    };
  },
};
</script>
  
  <style>
</style>