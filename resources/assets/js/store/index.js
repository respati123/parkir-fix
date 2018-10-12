import Vuex from 'vuex'
import Vue from 'vue'

Vue.use(Vuex)

const store = new Vuex.Store({
     state: {
          user: {
               isLogin: '',
               userData: [],
               menu: [],
               permission: [],
               passport: '',
               key: ''
          },
          tariffForm: []
          
     },
     getters: {
          getIsLogin: state => {
               return state.user.isLogin === "login";
          },
          getDataTariff: state => {
               return state.tariffForm;
          }
     },
     mutations: {
          insertData(state, payload) {
               // console.log(payload);
               const user = {
                    email: payload.email,
                    username: payload.username,
                    name: payload.name,
               }

               // console.log(user);

               state.user.userData = user;
               // console.log(dataPush);
               state.user.isLogin = payload.isLogin;

               state.user.key = payload.user;
               state.user.passport = payload.token;
               // console.log(payload.relation.meus);
               state.user.menu = payload.relation.menus;
               state.user.permission = payload.relation.permissions;
          },
          insertTariffForm(state, payload){
               payload.forEach((x) => {
                    state.tariffForm.push(x);
               })
          }
     },
     actions: {
          storingDataUser(context, payload){
               setTimeout(() => {
                    context.commit('insertData', payload)
               })
          }, 
          storingTariffForm(context, payload){
               setTimeout(() => {
                    context.commit('insertTariffForm', payload);
               })
          }
     }
})

export default store