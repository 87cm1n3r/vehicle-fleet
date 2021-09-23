<template>
  <div class="container">
    <div class="card border-0 shadow p-3" style="border-radius: 25px">
      <div class="card-body">
        <!-- Top items -->
        <div class="card-title mb-3">
          <div class="row g-3 align-items-center">
            <div class="col-auto fs-4"><strong>Vehicle Fleet</strong></div>
            <div class="col-auto col-md-3">
              <form class="form-inline">
                <input
                  type="text"
                  name="Search"
                  id="search"
                  placeholder="Search"
                  class="form-control"
                  v-model="search"
                />
              </form>
            </div>
            <div class="col-auto">
              <button class="btn btn-primary" @click="onEdit(-1)">
                <i class="bi bi-plus-lg"></i> Add new
              </button>
            </div>
          </div>
        </div>
        <!-- Table -->
        <data-table
          :items="vehicles"
          :headers="headers"
          :sort_column="sort_column"
          :sort_direction="sort_direction"
          @sort="onSort"
          @edit="onEdit"
          @destroy="onDestroy"
        ></data-table>
        <!-- Pagination -->
        <paginator
          :current_page="current_page"
          :last_page="last_page"
          @page-size="onPageSize"
          @change-page="onChangePage"
        ></paginator>
      </div>
    </div>
    <!-- Edit Modal -->
    <modal v-if="dialog_edit" @close="close" :title="edit_title">
      <template v-slot:body>
        <form>
          <div class="row g-3">
            <div
              class="col-md-6"
              v-for="(header, index) in headers"
              :key="index"
            >
              <label :for="header.value" class="form-label">{{
                header.text
              }}</label>
              <input
                type="text"
                class="form-control"
                :id="header.value"
                v-model="edited_item[header.value]"
              />
            </div>
          </div>
        </form>
      </template>
      <template v-slot:footer>
        <button type="button" class="btn btn-secondary" @click="close">
          Cancel
        </button>
        <button type="button" class="btn btn-primary" @click="onSubmitEdit">
          Save changes
        </button>
      </template>
    </modal>
    <!-- Destroy Modal -->
    <modal v-if="dialog_destroy" @close="close" title="Please confirm">
      <template v-slot:body>
        {{ destroy_text }}
      </template>
      <template v-slot:footer>
        <button type="button" class="btn btn-secondary" @click="close">
          Cancel
        </button>
        <button type="button" class="btn btn-danger" @click="onSubmitDestroy">
          Delete
        </button>
      </template>
    </modal>
  </div>
</template>

<script>
import DataTable from "./DataTable.vue";
import Paginator from "./Paginator.vue";
import Modal from "./Modal.vue";
export default {
  components: { DataTable, Paginator, Modal },
  data: function () {
    return {
      vehicles: [],
      headers: [
        { text: "Name", value: "name" },
        { text: "Registration number", value: "registration_number" },
        { text: "Mileage", value: "mileage" },
      ],
      current_page: 1,
      last_page: 1,
      per_page: 10,
      search: null,
      sort_column: "name",
      sort_direction: "asc",

      dialog_edit: false,
      dialog_destroy: false,
      edited_item_id: -1,
      edited_item: {
        name: null,
        registration_number: null,
        mileage: 0,
      },
      default_item: {
        name: null,
        registration_number: null,
        mileage: 0,
      },
    };
  },
  computed: {
    edit_title: function () {
      return this.edited_item_id == -1
        ? "New vehicle"
        : `Edit ${this.edited_item.name}`;
    },
    destroy_text: function () {
      return `Are you sure you want to delete: ${this.edited_item.name}?`;
    },
  },
  methods: {
    getVehicles() {
      axios
        .get("api/vehicles", {
          params: {
            per_page: this.per_page,
            page: this.current_page,
            search: this.search,
            sort_col: this.sort_column,
            sort_dir: this.sort_direction,
          },
        })
        .then((response) => {
          this.vehicles = response.data.data;
          this.current_page = response.data.current_page;
          this.last_page = response.data.last_page;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    addVehicle(data) {
      axios.post("api/vehicles", data).catch((error) => {
        console.log(error);
      });
    },
    updateVehicle(id, data) {
      axios.put(`api/vehicles/${id}`, data).catch((error) => {
        console.log(error);
      });
    },
    destroyVehicle(id) {
      axios.delete(`api/vehicles/${id}`).catch((error) => {
        console.log(error);
      });
    },
    onPageSize(per_page) {
      this.per_page = per_page;
      this.getVehicles();
    },
    onChangePage(page) {
      this.current_page = page;
      this.getVehicles();
    },
    onSort(column) {
      if (column === this.sort_column) {
        this.sort_direction = this.sort_direction === "desc" ? "asc" : "desc";
      }
      this.sort_column = column;
      this.getVehicles();
    },
    onEdit(id) {
      this.edited_item_id = id;
      if (id != -1) {
        var item = this.vehicles.filter((vehicle) => vehicle.id == id)[0];
        this.edited_item = Object.assign({}, item);
      }
      this.dialog_edit = true;
    },
    onDestroy(id) {
      this.edited_item_id = id;
      var item = this.vehicles.filter((vehicle) => vehicle.id == id)[0];
      this.edited_item = Object.assign({}, item);

      this.dialog_destroy = true;
    },
    onSubmitEdit() {
      if (this.edited_item_id == -1) this.addVehicle(this.edited_item);
      else this.updateVehicle(this.edited_item_id, this.edited_item);

      this.close();
      this.getVehicles();
    },
    onSubmitDestroy() {
      this.destroyVehicle(this.edited_item_id);
      this.close();
      this.getVehicles();
    },
    close() {
      this.edited_item_id = -1;
      this.edited_item = Object.assign({}, this.default_item);
      this.dialog_edit = false;
      this.dialog_destroy = false;
    },
  },
  created() {
    this.getVehicles();
    this.debouncedGetVehicles = _.debounce(this.getVehicles, 500);
  },
  watch: {
    search: function (newValue, oldValue) {
      if (this.search == "") this.search = null;
      this.debouncedGetVehicles();
    },
  },
};
</script>