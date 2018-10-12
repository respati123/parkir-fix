<template>
   <div>
       <div v-if="getNotif" class="error">
           <transition name="fade">
                <notification-error v-bind:error="error" ></notification-error>
           </transition>
       </div>
       <form class="form-signin" id="login" @submit.prevent="loginUser">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" v-model="user.email" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" v-model="user.password" class="form-control" placeholder="Password" required>
        <div class="checkbox mb-3">
            <label>
            <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
        </form>
   </div>
</template>

<script>

    export default {
        name: "login",
        data(){
            return {
                user: {
                    email: '',
                    password: ''
                },
                error: [],
                getNotif: false,
            }
        },
        methods: {
            loginUser(){
                axios.post('/api/v1/login/check', this.user)
                    .then( async response => {
                        console.log(response);

                        if(response.data.status === "success"){
                            let user = response.data.user
                            let token = user.token
                            let session = user.userID
                            let dataStorage = {token : token, session: session}
                            await this.includeStorage(dataStorage)
                            await this.storingDataUser(user)
                            setTimeout(() => {
                                window.location = "/dashboard"
                            }, 1500);
                        } 
                    }, error => {
                        this.getNotif = true;
                        this.error.push('Email or Password invalid')
                        setTimeout(() => {
                            this.getNotif = false
                            this.error = []
                        }, 1500)
                    });
            },
            storingDataUser(res){
                return new Promise((resolve, reject) => {
                    setTimeout(() => {
                        this.$store.dispatch("storingDataUser", res)
                    });
                    resolve();
                });
            },
            includeStorage(res){
               return new Promise((resolve, reject) => {
                   console.log(res);
                    let response = res;
                    let passport = response.token;
                    let session = response.session;
                    let dataSession = {user : session, isLogin: 'login'};
                    localStorage.setItem("_token_user", passport);
                    sessionStorage.setItem('user', JSON.stringify(dataSession));
                   setTimeout(() => {
                    resolve(passport)
                   }, 3000)
               });
            },

        },
        mounted(){
            if(this.$store.state.user.isLogin !== ''){
                return  console.log(this.$store.state.user.isLogin);
            }
            console.log("tidak ada store")

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