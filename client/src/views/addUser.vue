<template>
    <div class="container">
        <div>
            <h2>Добавление пользователя в систему</h2>
            <div class="form-group">
                <label>Email:</label>
                <input type="text" class="form-control" v-model="user.email">
            </div>
            <div class="form-group">
                <label>Пароль:</label>
                <input type="password" class="form-control" v-model="user.pass">
            </div>
            <button type="button" class="btn btn-success" @click="registerUser">Добавить пользователя</button>
            <div class="alert alert-success" v-if="status === 'good' ">
                <strong>Успешно!</strong>
            </div>
            <div class="alert alert-danger" v-if="status === 'bad' ">
                <strong>Заполните поля!</strong>
            </div>
        </div>
        <div>
            <h2>Список пользователей</h2>
            <div class="table-responsive full-height">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>User_Id</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(row,index) of db" :key="index">
                        <td v-for="(item,id) of row" :key="id">{{item}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "addUser",
        data: () => ({
            user: {
                email: '',
                pass: ''
            },
            status: ''
        }),
        methods: {
            registerUser() {
                if(this.user.email !== ''&& this.user.pass!==''){
                    const fd = new FormData()
                    fd.append('email', this.user.email)
                    fd.append('pass', this.user.pass)
                    this.$axios.post('userslist', fd).then(res=>{
                        res.status === 200 && this.getUsersList()
                        this.status = 'good'
                        setTimeout(()=>{
                           this.status = ''
                        },3000)
                    })
                }else{
                    this.status = 'bad'
                    setTimeout(()=>{
                        this.status = ''
                    },3000)
                }

            },
            async getUsersList(){
                const {data} = await this.$axios.get('userslist')
                this.$store.dispatch('set_users_list',  data)
            }
        },
        computed:{
            db(){return this.$store.getters.users_list}
        },
        async created(){
            await this.getUsersList()
        }
    }
</script>

<style scoped>

</style>