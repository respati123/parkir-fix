
require('./bootstrap');
import VueRouter from 'vue-router';
import Vue from 'vue';
import router from './routers/index';
import store from './store';
import config from './ConfigApi/Config'
import App from './components/App.vue';
import VueResource from 'vue-resource';
import session from 'vue-session';

import viewLogin from './components/login'
import viewRegister from './components/register_admin'
import * as VueGoogleMaps from 'vue2-google-maps'

Vue.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyC0mn_NVmYSqo9zHzavUMEP5EVGiQHkknU',
        libraries: 'places', // This is required if you use the Autocomplete plugin
    },
})

Vue.use(VueRouter);
Vue.use(session);
Vue.use(VueResource);
Vue.component('notification-success', {
    name: 'notification',
    template: `<div class="alert alert-success" role="alert" >
                Success
            </div>`
});
Vue.component('notification-error', {
    props: {
        error: {
            type: Array,
            required: true 
        }
    },
    data(){
        return {
           
        }

    },  
    template: `
                <div>
                    <ul v-for="(errors, index) in error" v-bind:key="index">
                        <li>{{ errors }}</li>
                    </ul>                   
                </div > `,
    methods: {
        
    },
    computed: {

    },
});
const app = new Vue({
    el: "#app",
    router,
    store,
    session,
    // components: {
    //     'notification': {
    //         template: `<div class="alert alert-success" role="alert" >
    //             Success
    //         </div>`
    //     }
    // },
    render: (h) => h(App)
}).$mount('#app');


const login = new Vue({
    el: "#login",
    store,
    components: {
        loginView: viewLogin
    },
    data(){
        return {
            name: 'respati'
        }
    }
});

const register = new Vue({
    el: "#register",
    store,
    components: {
        registerView: viewRegister
    },
    data() {
        return {
            name: 'respati'
        }
    }
});

