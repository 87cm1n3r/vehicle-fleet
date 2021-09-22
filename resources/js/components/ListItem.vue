<template>
  <tr>
    <td>{{ vehicle.name }}</td>
    <td>{{ vehicle.registration_number }}</td>
    <td>{{ vehicle.mileage }}</td>
    <td>
      <a :href="'api/vehicles/'+vehicle.id" class="text-decoration-none text-accent"
        ><i class="bi-pencil-square"></i
      ></a>
      <a href="http://" class="text-decoration-none text-accent"
        ><i class="bi-trash-fill"></i
      ></a>
    </td>
  </tr>
</template>

<script>
export default {
  props: ["vehicle"],
};
</script>