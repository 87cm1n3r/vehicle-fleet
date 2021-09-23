<template>
  <tr>
    <td v-for="(header, i) in headers" :key="i">{{ item[header.value] }}</td>

    <td>
      <i class="bi-pencil-square text-primary" @click="$emit('edit',item.id)"></i>
      <i class="bi-trash-fill text-primary" @click="$emit('destroy',item.id)"></i>
    </td>
  </tr>
</template>

<script>
export default {
  props: ["item", "headers"],
};
</script>

<style>
    i {
        cursor: pointer;
    }
</style>