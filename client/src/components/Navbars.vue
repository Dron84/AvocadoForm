<template>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="#">Avocado Forms</a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" :class="{'collapsed': !show}" type="button" @click="show = !show">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" :class="{'show': show}" >
            <ul class="navbar-nav">
                <li class="nav-item">
                    <router-link to="/add" class="nav-link" href="#">Добавить</router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/" class="nav-link" href="#">Просмотреть</router-link>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
    export default {
        name: "Navbars",
        data: ()=>({
            show: false
        }),

    }
</script>

<style lang="sass">
    .nav-item
        .router-link-exact-active.router-link-active
            color: red
            border-bottom: 1px solid red

</style>