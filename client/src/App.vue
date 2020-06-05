<template>
    <div>
        <navbars v-if="loginin"/>
        <router-view/>
    </div>
</template>
<script>
    import navbars from './components/Navbars'

    export default {
        name: "App",
        components: {navbars},
        computed: {
            loginin(){return this.$store.getters.login}
        }
    }
</script>

<style lang="sass">
    .container-fluid
        margin: 0
        padding: 0
</style>
