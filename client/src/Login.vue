<template>
    <div class="Login">
        <form>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" class="form-control" placeholder="Введите email" v-model="email">
            </div>
            <div class="form-group">
                <label>Пароль:</label>
                <input type="password" class="form-control" placeholder="Введите пароль" v-model="pass">
            </div>
            <div class="form-group form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" v-model="remember"> Запомнить
                </label>
            </div>
            <button type="submit" class="btn btn-primary" @click.prevent="SubmitForm">Войти</button>
        </form>
    </div>
</template>

<script>
    import base64 from 'base-64'
    import VueCookie from 'vue-cookie'

    export default {
        name: "Login",
        data: ()=>({
            email: '',
            pass: '',
            remember: false,
        }),
        methods:{
            async SubmitForm(){
                const fd = new FormData()
                fd.append('email',this.email)
                fd.append('pass', base64.encode( base64.encode(this.pass) ) )
                fd.append('remember', this.remember)
                const {data} = await this.$axios.post('/getLogin',fd)
                VueCookie.set('loginToken',data,7)
                location.reload()
            }
        }
    }
</script>

<style scoped lang="sass">
.Login
    display: flex
    height: 100vh
    align-items: center
    justify-content: center
    form
        min-width: 320px
</style>