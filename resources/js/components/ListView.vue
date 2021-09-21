<template>
    <div class="table-responsive" style="height: 70vh;">
        <table class="table table-borderless">
        <thead style="position: sticky; top: 0;" class="bg-white mb-5 rounded-top bg-light">
            <th scope="col">Name</th>
            <th scope="col">Registration Number</th>
            <th scope="col">Mileage</th>
            <th scope="col">Action</th>
        </thead>
        <tbody>
            <list-item v-for="(vehicle, index) in vehicles" :key="index" :vehicle="vehicle"></list-item>
        </tbody>
    </table>
    </div>
</template>

<script>
import ListItem from './ListItem.vue'
export default {
  components: { ListItem },
props: ['vehicles']
}
</script>