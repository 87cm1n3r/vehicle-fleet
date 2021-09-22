<template>
  <thead class="table-light">
    <tr>
      <th
        v-for="(header, index) in headers"
        :key="index"
        @click="$parent.$emit('on-sort', header.value)"
      >
        {{ header.text }}
        <i v-visible="sort_column == header.value" :class="caretIcon"></i>
      </th>
    </tr>
  </thead>
</template>

<script>
export default {
  props: ["headers", "sort_column", "sort_direction"],
  computed: {
    caretIcon: function () {
      return this.sort_direction == "asc"
        ? "bi-caret-up-fill"
        : "bi-caret-down-fill";
    },
  },
};
</script>

<style scoped>
th {
  user-select: none;
  cursor: pointer;
}
</style>