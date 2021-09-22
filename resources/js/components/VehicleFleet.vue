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
        <!-- Vehicles table -->
        <list-view :vehicles="vehicles"></list-view>
        <!-- Pagination -->
        <nav aria-label="Page navigation example" class="mt-3">
          <ul class="pagination justify-content-end">
            <li class="page-item disabled">
              <a class="page-link">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="#">99</a></li>
            <li class="page-item">
              <a class="page-link" href="#">Next</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</template>

<script>
import ListView from "./ListView.vue";
export default {
  components: { ListView },
  data: function () {
    return {
      vehicles: [],
    };
  },
  methods: {
    getVehicles() {
      axios
        .get("api/vehicles")
        .then((response) => {
          this.vehicles = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  created() {
    this.getVehicles();
  },
};
</script>