<template>
   <div class="box box-info">
      <div class="box-header with-border">
         <h3 class="box-title">Horizontal Form</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form class="form-horizontal" @submit.prevent="editRoles">
         <div class="box-body">
            <div class="form-group">
               <label for="roleInput" class="col-sm-2 control-label">Role</label>

               <div class="col-sm-10">
                  <input class="form-control" id="roleInput" v-model="roleName.name" placeholder="role" type="text">
               </div>
            </div>
            <div class="form-group">
               <label for="permissions" class="col-sm-2 control-label">Permissions</label>
               <div class="col-sm-10">
                  <div class="textboxt-with-button" v-if="isEmpty">
                     <p>tidak ada data permission</p>
                     <router-link  :to="{name: 'createPermissions'}">Create Permissions</router-link>
                  </div>
                  <select v-else multiple="true" class="form-control" id="permissions" @dblclick="sortBy" v-model="multipleSelected">
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
                     <button type="button" class="close"  v-on:click="removeList(index, roleSelected.name, roleSelected.value)" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
               </div>
            </div>

            <div class="form-group">
              <div class="col-md-10 col-md-offset-2">
                <div class="row">
                  <div class="col-md-6">
                    <pre>{{ this.roles }}</pre>
                  </div>
                   <div class="col-md-6">
                    <pre>{{ this.rolesHasSelected }}</pre>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
               <label for="permissions" class="col-sm-2 control-label">Menus</label>
               <div class="col-sm-10">
                  <div class="textboxt-with-button" v-if="isEmptyMenus">
                     <p>tidak ada data permission</p>
                     <router-link  :to="{name: 'createMenus'}">Create Menus</router-link>
                  </div>
                  <select v-else multiple="true" class="form-control" id="menus" @dblclick="menuSortBy" v-model="multipleSelected">
                     <option v-for="(menu, index) in this.menus"
                             :value="menu.value" v-bind:key="index">
                        {{menu.name}}
                     </option>
                  </select>
               </div>
            </div>
            <div class="form-group">
               <div class="col-sm-10 col-sm-offset-2" style="display: flex;">
                  <div class="badge-theme" v-for="(menuselect, index) in menusSelected" v-bind:key="index">
                     <p>{{ menuselect.name }}</p>
                     <button type="button" class="close"  v-on:click="removeListMenus(index, menuselect.name, menuselect.value)" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
               </div>
            </div>
            <div class="form-group">
              <div class="col-md-10 col-md-offset-2">
                <div class="row">
                  <div class="col-md-6">
                    <pre>{{ this.menus }}</pre>
                  </div>
                   <div class="col-md-6">
                    <pre>{{ this.menusSelected }}</pre>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
               <div class="col-md-10 col-md-offset-2">
                  <button type="submit" class="btn btn-success">Save <i class="fa fa-check"></i></button>
                  <router-link :to="{ name: 'rolesIndex'}" class="btn btn-danger">Cancel <i class="fa fa-times"></i></router-link>
               </div>
            </div>
         </div>
      </form>
   </div>
</template>

<script>
    import axios from 'axios'
    export default {
        name: "editRoles",
        data(){
            return {
                multipleSelected:[],
                rolesHasSelected:[],
                roles:[],
                roleName: {
                    name: '',
                    id:''
                },
                menus:[],
                menusSelected:[]
            }
        },
        mounted() {            
            if(this.roleName !== null){
                console.log("masuk")
            }
        },
        methods: {
            sortBy: function(e) {
                console.log(e.target);
                let items = {};
                items['name'] = e.target.text;
                items['value'] = e.target.value;

                if(items['value'] === '' && items['name'] === undefined){
                  return;
                }

                this.rolesHasSelected.push(items);
                this.roles.splice(e.target.index, 1);
            },
            menuSortBy: function(e){
                let itemsMenus = {};
                itemsMenus['name'] = e.target.text;
                itemsMenus['value'] = e.target.value;

                if(itemsMenus['value'] === '' && itemsMenus['name'] === undefined){
                  return;
                }

                this.menusSelected.push(itemsMenus);
                this.menus.splice(e.target.index, 1);
            },
            removeList: function(index, name, value){
                console.log(index + "," + name + "," + value);
                this.roles.unshift({name: name, value: value});
                this.rolesHasSelected.splice(index, 1)
            },
            removeListMenus: function(index, name, value){
              this.menus.unshift({name: name, value: value});
              this.menusSelected.splice(index, 1);
            },
            editRoles: function(){
               axios.put('/api/v1/roles/' + this.$route.params.id, {role:this.rolesHasSelected, name:this.roleName, menu:this.menusSelected})
                   .then(response => {
                       this.$router.push({
                           name: 'rolesIndex'
                       });
                   }, (error => {
                       console.log(error.message);
                   }));
            },
            getMenus: function(){
              this.$http.get('/api/v1/getMenus/')
                .then(response => {
                    let temp = response.data;
                    temp.forEach(item => {
                      this.menus.push({name: item.name, value: item.id});
                    })
                }, (error => {

                }));
            },
            getRoles: function(){
                this.getPermission();
                this.getMenus();
                axios.get('/api/v1/roles/' + this.$route.params.id)
                .then((response) => {
                    let menus = response.data.data.menu;
                    let permissions = response.data.data.permission;
                    let dataRole = response.data.data;

                    this.roleName.name = dataRole.name;
                    this.roleName.id = dataRole.id;

                   menus.forEach((menu, index) => {
                      this.menusSelected.push({name: menu.name, value: menu.id});
                   });       
                   this.menusSelected.forEach(selected => {
                     this.menus.map((menus,index) => {
                        if(menus.value === selected.value){
                           this.menus.splice(index, 1);
                           return;
                        }
                      });
                   });

                   permissions.forEach(permission => {
                    this.rolesHasSelected.push({name: permission.name, value: permission.id});
                   })
                   this.rolesHasSelected.forEach(perms => {
                      this.roles.map((perm, index) => {
                        if(perm.value === perms.value){
                          this.roles.splice(index, 1);
                          return;
                        }
                      })
                   })
                }, (error) => {
                    console.log(error.message)
                });
              },
            getPermission: function(){
              axios.get('/api/v1/getAllPermissions/')
                .then((response) => {
                    let dataRoles = response.data.data;
                    dataRoles.forEach(item => {
                        let items = {};
                        items['name'] = item.name;
                        items['value'] = item.id;
                        this.roles.push(items);
                    });
                });
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
        beforeMount(){
          this.getRoles();
        }

    }
</script>

<style scoped>

</style>