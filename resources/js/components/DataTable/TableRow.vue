<template>
    <tr>
        <td v-for="(header, i) in headers" :key="i">{{item[header.value]}}</td>
    </tr>
</template>

<script>
export default {
    props: ['item', 'headers']
}
</script>