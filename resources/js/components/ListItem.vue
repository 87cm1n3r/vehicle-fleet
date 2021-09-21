<template>
    <tr>
        <td>{{vehicle.name}}</td>
        <td>{{vehicle.registration_number}}</td>
        <td>{{vehicle.mileage}}</td>
        <td><i class="bi bi-pencil-square"></i> <i class="bi bi-trash-fill"></i></td>
    </tr>
</template>

<script>
export default {
    props: ['vehicle']
}
</script>