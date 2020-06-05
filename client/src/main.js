import Vue from 'vue'
import App from './App.vue'
import Login from './Login.vue'
import router from './router'
import store from './store'
import BootstrapVue from "bootstrap-vue"
import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap-vue/dist/bootstrap-vue.css"
import axios from 'axios'
import VueCookie from 'vue-cookie'
import base64 from 'base-64'

// const API_URL = '//test.loc/api/'
let API_URL

Vue.use(BootstrapVue)

if(location.host === 'localhost:8080'){
    Vue.config.productionTip = false
    API_URL = '//test.loc/api/'
}else{
    Vue.config.productionTip = true
    API_URL = '/api/'
}

const LoginToken = VueCookie.get('loginToken')
if(LoginToken!==undefined && LoginToken!==null){
    Vue.prototype.$axios = axios.create({baseURL: API_URL, headers: {token: LoginToken} })
    const token = JSON.parse(base64.decode(LoginToken))
    const expTime = JSON.parse(base64.decode(base64.decode(token.token))).exptime * 1000
    const user_id = JSON.parse(base64.decode(base64.decode(token.token))).data.id
    const time = + new Date()
    store.dispatch('setLogin',true)
    store.dispatch('setUserId',user_id)
    if(time<=expTime){
        new Vue({
            router,
            store,
            render: h => h(App)
        }).$mount('#app')
    }else{
        new Vue({
            router,
            store,
            render: h => h(Login)
        }).$mount('#app')
    }
}else{
    Vue.prototype.$axios = axios.create({baseURL: API_URL })
    new Vue({
        router,
        store,
        render: h => h(Login)
    }).$mount('#app')
}



