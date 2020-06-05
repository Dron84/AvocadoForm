<template>
    <div class="col" v-if="!hidden">
        <input type="text" class="form-control" :placeholder="label" @change="$emit('input', $event.target.value)">
    </div>
    <div class="col" v-else>
        &nbsp;
    </div>
</template>

<script>
    export default {
        name: "inputs",
        props: {
            label: '',
            hidden: {type: Boolean, default: false}
        }
    }
</script>

<style scoped>

</style>