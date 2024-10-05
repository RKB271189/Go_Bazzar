<template>
  <div
    class="modal fade"
    id="ModalRole"
    data-bs-backdrop="static"
    data-bs-keyboard="false"
    tabindex="-1"
    aria-labelledby="RoleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="RoleModalLabel">Create/Update Role</h5>
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
              <label for="role_name" class="form-label">Role Name</label>
              <input
                type="text"
                class="form-control"
                id="role_name"
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
          <button type="button" class="btn btn-primary" @click="createRole">
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
    let roleModalInstance = null;
    onMounted(async () => {
      const roleModalEl = document.getElementById("ModalRole");
      roleModalInstance = new Modal(roleModalEl);
    });
    const createRole = () => {
      emit("createRole", name.value);
    };
    const hideModal = () => {
      roleModalInstance.hide();
    };
    expose({ hideModal });
    return {
      name,
      createRole,
      hideModal,
    };
  },
};
</script>

<style>
</style>