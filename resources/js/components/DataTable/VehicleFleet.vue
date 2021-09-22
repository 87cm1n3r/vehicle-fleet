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
              <button class="btn btn-primary">
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
          @on-sort="onSort"
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
  </div>
</template>

<script>
import DataTable from "./DataTable.vue";
import Paginator from "./Paginator.vue";
export default {
  components: { DataTable, Paginator },
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
    };
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