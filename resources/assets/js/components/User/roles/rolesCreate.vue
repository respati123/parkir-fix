<template>
    <div>
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Horizontal Form</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form  @submit.prevent="addRoles" class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Name Roles</label>

                            <div class="col-sm-10">
                                <input class="form-control" v-model="roleName.value" id="inputName" placeholder="roles" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Permissions</label>
                            <div class="col-sm-10">
                                <div class="textboxt-with-button" v-if="isEmpty">
                                    <p>tidak ada data permission</p>
                                    <router-link  :to="{name: 'createPermissions'}">Create Permissions</router-link>
                                </div>
                                <select v-else multiple="true" class="form-control" @dblclick="sortBy" v-model="multipleSelected">
                                    <option v-for="(role, index) in roles"
                                    :value="role.value" v-bind:key="index">
                                        {{role.name}}
                                    </option>
                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2" style="display: flex;">
                                <div class="badge-theme" v-for="(roleSelected, index) in rolesHasSelected" v-bind:key="index">
                                    <p>{{ roleSelected.name }}</p>
                                    <button type="button" class="close"  v-on:click="removeListRoles(index, roleSelected.name, roleSelected.value)" aria-label="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <pre>{{ this.roles}}</pre>
                                    </div> <div class="col-md-6">
                                        <pre>{{ this.rolesHasSelected}}</pre>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Menus</label>
                            <div class="col-sm-10">
                                <div class="textboxt-with-button" v-if="isEmptyMenus">
                                    <p>tidak ada data menus</p>
                                    <router-link  :to="{name: 'createMenus'}">Create Menus</router-link>
                                </div>
                                <select v-else multiple="true" class="form-control" @dblclick="sortMenus" v-model="menusMultiSelected">
                                    <option v-for="(menu, index) in menus"
                                            :value="menu.value" v-bind:key="index">
                                        {{menu.name}}
                                    </option>
                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2" style="display: flex;">
                                <div class="badge-theme" v-for="(menuSelected, index) in menusSelected" v-bind:key="index">
                                    <p>{{ menuSelected.name }}</p>
                                    <button type="button" class="close"  v-on:click="removeListMenus(index, menuSelected.name, menuSelected.value)" aria-label="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="col-md-10 col-md-offset-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <pre>{{ this.menus}}</pre>
                                    </div> <div class="col-md-6">
                                        <pre>{{ this.menusSelected}}</pre>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button class="btn btn-primary" type="submit">save <i class="fa fa-check"></i></button>
                                <button class="btn btn-warning" >Back <i class="fa fa-times"></i></button>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </form>
            </div>
            <!-- /.box -->

        </div>
    </div>

</template>

<script>


    import axios from "axios";

    export default {
        name: "createUser",
        data() {
            return {

                multipleSelected: [],
                roles: [],
                roleName: {
                    value: ''
                },
                rolesHasSelected:[],

                menus: [],
                menusSelected:[],
                menusMultiSelected:[]
            }
        },
        computed: {
            isEmpty: function(){
                return this.roles.length === 0;
            },
            isEmptyMenus: function(){
                return this.menus.length === 0;
            }
        },
        methods: {
            sortBy: function(e){
               let items = {};
               items['name'] = e.target.text;
               items['value'] = e.target.value;
              
               if(items['value'] === '' && items['name'] === undefined){
                return;
               }
               this.rolesHasSelected.push(items);
               this.roles.splice(e.target.index, 1);


            },
            removeListRoles: function(index, name, value){
                console.log(index + "," + name + "," + value);
                this.roles.unshift({name: name, value: value});
                this.rolesHasSelected.splice(index, 1)
            },

            removeListMenus: function(index, name, value){
                console.log(index + "," + name + "," + value);
                this.menus.unshift({name: name, value: value});
                this.menusSelected.splice(index, 1)
            },
            addRoles: function(){

                console.log('masuk add');
                axios.post('/api/v1/roles/', {roles:this.rolesHasSelected,name:this.roleName, menus:this.menusSelected} )
                    .then((response) => {
                        if(response.data.message === 'success'){
                            this.$router.push({
                                name: 'rolesIndex',
                                messages: response.data.message
                            });
                        }
                    }, (error) => {

                    });

            },
            getMenus: function () {
                axios.get('/api/v1/getMenus/')
                    .then(response => {
                        let temp = response.data;
                        console.log(temp);
                        temp.forEach(item => {
                           this.menus.push({name: item.name, value: item.id});
                        });
                    }, (error => {

                    }));
            },
            sortMenus: function (e) {
                let menus = {};
                menus['name'] = e.target.text;
                menus['value'] = e.target.value;

                if(menus['value'] === '' && menus['name'] === undefined){
                    return;
                }

                this.menusSelected.push(menus);
                this.menus.splice(e.target.index, 1);
            },
            getPermission: function(){
                  axios.get('/api/v1/getAllPermissions/')
                .then((response) => {
                    let temp = response.data.data;
                    console.log(temp);
                    temp.forEach(item => {
                        this.roles.push({name : item.name, value: item.id});
                    }, (error => {
                        console.log(error.message);
                    }));
                });
            }

        },
        beforeMount(){
            this.getMenus();
            this.getPermission();
        }

    }
</script>
<style scoped>
    .textboxt-with-button {

        display: flex;
        padding-top: 8px;

    }

    .textboxt-with-button p {

        margin-top: auto;
        margin-bottom: auto;
        margin-right: 10px;

    }
</style>