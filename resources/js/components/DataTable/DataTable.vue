<template>
  <div class="table-responsive rounded-top" style="min-height: 55vh;">
    <table class="table table-hover">
      <table-head
        :headers="headers"
        :sort_column="sort_column"
        :sort_direction="sort_direction"
        v-on="$listeners"
      ></table-head>
      <tbody>
        <table-row
          v-for="(item, index) in items"
          :key="index"
          :item="item"
          :headers="headers"
          v-on="$listeners"
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