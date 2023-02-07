import Vue from 'vue'
import Vuex from 'vuex'

// Modules
import app from './app'
import appConfig from './app-config'
import verticalMenu from './vertical-menu'
import authStore from './modules/authStore'
import offerStore from './modules/offerStore'
import axios from "axios";
Vue.use(Vuex)

const store = new Vuex.Store({
  modules: {
    app,
    appConfig,
    verticalMenu,
    authStore,
    offerStore
  },
  strict: process.env.DEV,
})
store.subscribe((mutation) => {

    switch (mutation.type){
        case "INIT_TOKEN":
            if(mutation.payload){
                axios.defaults.headers.common["Authorization"]=`Bearer ${mutation.payload}`
                localStorage.setItem("token",mutation.payload)
            }else{
                delete axios.defaults.headers.common["Authorization"]
                localStorage.removeItem("token")
            }
            break
    }
})

export default store
