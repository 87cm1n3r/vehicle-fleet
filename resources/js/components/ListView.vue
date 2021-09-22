<template>
  <div class="table-responsive rounded-top" style="height: 60vh">
    <table class="table table-borderless table-hover table-striped">
      <thead style="position: sticky; top: 0" class="table-light">
        <tr>
          <th @click="sort('name')">
            Name<i v-visible="currentCol == 'name'" :class="caretIcon"></i>
          </th>
          <th @click="sort('registration_number')">
            Registration Number<i
              v-visible="currentCol == 'registration_number'"
              :class="caretIcon"
            ></i>
          </th>
          <th @click="sort('mileage')">
            Mileage<i v-visible="currentCol == 'mileage'" :class="caretIcon"></i>
          </th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <list-item
          v-for="(vehicle, index) in sortedVehicles"
          :key="index"
          :vehicle="vehicle"
        ></list-item>
      </tbody>
    </table>
  </div>
</template>

<script>
import ListItem from "./ListItem.vue";
export default {
  components: { ListItem },
  props: ["vehicles"],
  data: function () {
    return {
      sortDirection: "asc",
      currentCol: "name",
    };
  },
  methods: {
    sort: function (col) {
      if (col === this.currentCol) {
        this.sortDirection = this.sortDirection === "desc" ? "asc" : "desc";
      }
      this.currentCol = col;
    },
  },
  computed: {
    sortedVehicles: function () {
      return this.vehicles.sort((a, b) => {
        let m = this.sortDirection === "asc" ? 1 : -1;

        a = a[this.currentCol];
        b = b[this.currentCol];

        return (a === b ? 0 : a > b ? 1 : -1) * m;
      });
    },
    caretIcon: function () {
      return this.sortDirection == "asc"
        ? "bi-caret-up-fill"
        : "bi-caret-down-fill";
    },
  },
};
Vue.directive('visible', function(el, binding) {
	el.style.visibility = !!binding.value ? 'visible' : 'hidden';
});
</script>

<style scoped>
th {
  cursor: pointer;
  user-select: none;
}

</style>