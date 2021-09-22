<template>
  <div class="table-responsive rounded-top">
    <table class="table table-hover">
      <table-head
        :headers="headers"
        :sort_column="sort_column"
        :sort_direction="sort_direction"
      ></table-head>
      <tbody>
        <table-row
          v-for="(item, index) in items"
          :key="index"
          :item="item"
          :headers="headers"
        ></table-row>
      </tbody>
    </table>
  </div>
</template>

<script>
import TableHead from "./TableHead.vue";
import TableRow from "./TableRow.vue";

export default {
  components: { TableHead, TableRow },
  props: ["headers", "items", "sort_column", "sort_direction"],
};
</script>