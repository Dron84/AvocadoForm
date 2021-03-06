import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        login: false,
        maindata: null,
        user_id: null,
        users_list: [],
    },
    mutations: {
        SET_LOGIN(state, val) {
            state.login = val
        },
        SET_DB(state,val){
            state.maindata = val
        },
        SET_USER_ID(state,val){
            state.user_id = val
        },
        SET_USERS_LIST(state,val){
            state.users_list = val
        }
    },
    actions: {
        setLogin(state, val) {
            state.commit('SET_LOGIN', val)
        },
        setUserId(state,val){
            state.commit('SET_USER_ID',val)
        },
        set_users_list(state,val){
            state.commit('SET_USERS_LIST',val)
        }
    },
    getters: {
        login(state) {return state.login},
        maindata(state){return state.maindata},
        user_id(state){return state.user_id},
        users_list(state){return state.users_list}
    }
})
