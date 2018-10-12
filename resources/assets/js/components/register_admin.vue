<template>
   <div>
       <div v-if="getNotif" class="error">
           <transition name="fade">
                <notification-error v-bind:error="error" ></notification-error>
           </transition>
       </div>
       <form class="form-signin" id="registerAdmin" @submit.prevent="registerAdmin">
        <h1 class="h3 mb-3 font-weight-normal">Please Sign Up For Admin</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" v-model="user.email" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputUsername" class="sr-only">Username</label>
        <input type="text" v-model="user.username" class="form-control" placeholder="Username" required>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" v-model="user.password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
        </form>
   </div>
</template>

<script>

    export default {
        name: "register",
        data(){
            return {
                user: {
                    email: '',
                    username: '',
                    password: ''
                },
                error: [],
                getNotif: false,
            }
        },
        methods: {
            registerAdmin(){
                axios.post('/api/v1/register/admin', this.user)
                    .then( async response => {
                        window.location = '/login';
                    }, error => {
                       console.log(error);
                    });
            },
           
        },
        mounted(){

        },
        computed: {
        }
    }
</script>

<style scoped>
    .error {
        box-sizing: border-box;
        padding: 10px;
        background-color: blue;
        color:red;
        top: 10px;
        width:20%;
        height: auto;
        right: 3px;
        font-size: 1em;
        border-radius: 20px;
        position: absolute;
        z-index: 999;
        margin-top: 10px;
    }

    .fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
    }
</style>