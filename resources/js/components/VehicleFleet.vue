<template>
  <div class="container">
    <div class="card border-0 shadow p-3" style="border-radius: 25px">
      <div class="card-body">
        <div class="card-title mb-3">
          <div class="row g-3 align-items-center">
            <div class="col-auto"><strong>Vehicle Fleet</strong></div>
            <div class="col-auto col-md-3">
              <form class="form-inline">
                <input type="text" name="Search" id="search" placeholder="Search" class="form-control">
              </form>
            </div>
          </div>
        </div>
        <list-view :vehicles="vehicles"></list-view>
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