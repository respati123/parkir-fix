<template>
    <div style="width: 100%;">
        <header class="main-header">

            <!-- Logo -->
            <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>LTE</span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-envelope-o"></i>
                    <span class="label label-success">4</span>
                    </a>
                    <ul class="dropdown-menu">
                    <li class="header">You have 4 messages</li>
                    <li>
                        <!-- inner menu: contains the messages -->
                        <ul class="menu">
                        <li><!-- start message -->
                            <a href="#">
                            <div class="pull-left">
                                <!-- User Image -->
                                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                            </div>
                            <!-- Message title and timestamp -->
                            <h4>
                                Support Team
                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                            </h4>
                            <!-- The message -->
                            <p>Why not buy a new awesome theme?</p>
                            </a>
                        </li>
                        <!-- end message -->
                        </ul>
                        <!-- /.menu -->
                    </li>
                    <li class="footer"><a href="#">See All Messages</a></li>
                    </ul>
                </li>
                <!-- /.messages-menu -->

                <!-- Notifications Menu -->
                <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bell-o"></i>
                    <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                    <li class="header">You have 10 notifications</li>
                    <li>
                        <!-- Inner Menu: contains the notifications -->
                        <ul class="menu">
                        <li><!-- start notification -->
                            <a href="#">
                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                            </a>
                        </li>
                        <!-- end notification -->
                        </ul>
                    </li>
                    <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li>
                <!-- Tasks Menu -->
                <li class="dropdown tasks-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-flag-o"></i>
                    <span class="label label-danger">9</span>
                    </a>
                    <ul class="dropdown-menu">
                    <li class="header">You have 9 tasks</li>
                    <li>
                        <!-- Inner menu: contains the tasks -->
                        <ul class="menu">
                        <li><!-- Task item -->
                            <a href="#">
                            <!-- Task title and progress text -->
                            <h3>
                                Design some buttons
                                <small class="pull-right">20%</small>
                            </h3>
                            <!-- The progress bar -->
                            <div class="progress xs">
                                <!-- Change the css width attribute to simulate progress -->
                                <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                                    aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                <span class="sr-only">20% Complete</span>
                                </div>
                            </div>
                            </a>
                        </li>
                        <!-- end task item -->
                        </ul>
                    </li>
                    <li class="footer">
                        <a href="#">View all tasks</a>
                    </li>
                    </ul>
                </li>
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <!-- The user image in the navbar-->
                    <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                    <span class="hidden-xs">Alexander Pierce</span>
                    </a>
                    <ul class="dropdown-menu">
                    <!-- The user image in the menu -->
                    <li class="user-header">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                        <p>
                        Alexander Pierce - Web Developer
                        <small>Member since Nov. 2012</small>
                        </p>
                    </li>
                    <!-- Menu Body -->
                    <li class="user-body">
                        <div class="row">
                        <div class="col-xs-4 text-center">
                            <a href="#">Followers</a>
                        </div>
                        <div class="col-xs-4 text-center">
                            <a href="#">Sales</a>
                        </div>
                        <div class="col-xs-4 text-center">
                            <a href="#">Friends</a>
                        </div>
                        </div>
                        <!-- /.row -->
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right">
                        <button @click="logOut"  class="btn btn-default btn-flat">Sign out</button>
                        </div>
                    </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
                </ul>
            </div>
            </nav>
        </header>
       
        <!-- <sidebar v-bind:menu="menu"></sidebar> -->
        <sidebar v-bind:menu="menu"></sidebar>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <keep-alive>
                    <router-view name="componentsIndex"></router-view>
                    <router-view
                        :key="$route.fullPath"
                        ref="router"
                    ></router-view>
                </keep-alive>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="pull-right hidden-xs">
            Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane active" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript:;">
                    <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                    <div class="menu-info">
                        <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                        <p>Will be 23 on April 24th</p>
                    </div>
                    </a>
                </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript:;">
                    <h4 class="control-sidebar-subheading">
                        Custom Template Design
                        <span class="pull-right-container">
                            <span class="label label-danger pull-right">70%</span>
                        </span>
                    </h4>

                    <div class="progress progress-xxs">
                        <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                    </div>
                    </a>
                </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                <h3 class="control-sidebar-heading">General Settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                    Report panel usage
                    <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                    Some information about this general settings option
                    </p>
                </div>
                <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
            </div>
        </aside>
    </div>
</template>

<script>
    import sidebar from '../components/sidebar.vue'
    import {EventBus} from '../event-bus/event-bus'

    export default {
        name: "App",
        data(){
            return {
                loading: true,
                passport: '',
                menu: [],
                user: [],
                menuopen: 'menu-open',
                isActive: false,
                display: 'none',
                tests: [
                    '1','2','3'
                ]
            }
        },
        directives: {
            focus: {
                inserted: function(el, index, params){
                    el.focus();
                }
            }
        },
        components: {
            'sidebar': sidebar,
            
        },
        mounted(){
            this.menu = this.$store.state.user.menu;
        },
        methods: {
            setDataUser: function(response){
                return new Promise((resolve, reject) => {
                    setTimeout(() => {
                        this.$store.dispatch('storingDataUser', response.data.request)
                        resolve(false)
                    })
                })
            },
            clickAble: function(el){
                    
                    const $item = $(this.$el);
                    const elm = $item.find('ul.treeview-menu');
                    const $parsing = $(elm[el]);
                    console.log($parsing.attr('style').replace(' ',''));
                    if($parsing.attr('style').replace(" ", "") === "display:block;"){
                       return $parsing.css('display','none');
                    } else if($parsing.attr('style').replace(' ','') === "display:none;"){
                       elm.css('display','none');
                       return $parsing.css('display','block');
                    }
                    return $parsing.css('display','block');
            },
           
            deleteData: function(){
                window.localStorage.removeItem('_token_user');
                window.sessionStorage.removeItem('user');
                return true;
            },
            logOut:  async function(){
               const del =  await this.deleteData();
               del === true ? window.location = "/login" : null
            },
            settDataUser: function(){
                console.log("tidka ada store");
                let sessionID = JSON.parse(window.sessionStorage.getItem('user'));
                new Promise((resolve, reject) => {
                    axios.post("api/v1/get_data_user", {
                        headers: {
                            "Authorization" : "Bearer "+ window.localStorage.getItem("_token_user"),
                            "Content-type": 'application/x-www-form-urlencoded',
                            "Accept": 'application/json'
                        },
                        data: {user: sessionID, token: window.localStorage.getItem("_token_user")}
                    })
                    .then( async(response) => {
                        console.log(response);
                        let menu = response.data.request.relation.menus;
                        this.menu = menu;
                        await this.setDataUser(response);
                    }, error => {
                        console.log(error.response)
                    });
                    return resolve();
                })
            }
        },
        mounted(){
           EventBus.$on('checkSettData', (item) => {
               return item === true ? this.settDataUser() : ''
           });
        },
        beforeMount(){
            console.log(this.$store.getters.getIsLogin);
            if(this.$store.getters.getIsLogin){
                console.log("ada store")
                this.$store.state.user.forEach((i, item) => {
                    console.log(item);
                });
            } else {
               this.settDataUser();
            }
            // if(this.$store.state.user.isLogin === ''){
            //    
                
            // }            
        }


    }
</script>

<style lang="scss">

    // @import '../../../../public/bower_components/bootstrap/dist/css/bootstrap.min.css';
    // @import '../../../../public/dist/css/AdminLTE.min.css';
    // @import '../../../../public/bower_components/Ionicons/css/ionicons.min.css';
    // @import '../../../../public/dist/css/skins/_all-skins.min.css';
    // @import '../../../../public/css/styles.css';
    // @import '../../../../public/bower_components/font-awesome/css/font-awesome.min.css';
    // @import '../../../../public/bower_components/morris.js/morris.css';
    // @import '../../../../public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css';
    // @import '../../../../public/bower_components/bootstrap-daterangepicker/daterangepicker.css';
    // @import '../../../../public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css';
 
</style>