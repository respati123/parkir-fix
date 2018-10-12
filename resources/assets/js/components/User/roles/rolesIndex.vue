<template>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title margin-r-5">Data Table With Full Features</h3>
            <router-link class="btn btn-primary pull-right" :to="{ name : 'createRoles'}">Create New</router-link>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Role Name</th>
                    <th width="200px">Has Permissions</th>
                    <th width="200px">Has Menus</th>
                    <th>Created By</th>
                    <th>Created At</th>
                    <th>Modifier By</th>
                    <th>Modifier At</th>

                </tr>
                </thead>
                <tbody>
                    <tr v-for="dt in dataTable">
                        <td>{{ dt.name }}</td>
                        <td>
                            <div class="col-md-12">
                                <span class="badge badge-secondary" v-for="perm in dt.permission">
                                    {{ perm.name }}
                                </span>
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12">
                                <span class="badge badge-secondary" v-for="menu in dt.menu">
                                    {{ menu.name }}
                                </span>
                            </div>
                        </td>
                        <td>{{ dt.created_by }}</td>
                        <td>{{ dt.created_at }}</td>
                        <td>{{ dt.modifier_by }}</td>
                        <td>{{ dt.modifier_at }}</td>
                        <td>
                            <router-link :to="{ name: 'editRoles',  params: { id : dt.id }}" class="btn btn-warning">Edit <i class="fa fa-pencil"></i></router-link>
                            <button type="button" class="btn btn-danger">Delete <i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</template>

<script>

    import axios from 'axios'
    export default {
        name: "userIndex",
        data(){
            return {
                dataTable: []
            }
        },
        methods: {
          getData(){

              axios.get('/api/v1/roles/')
                  .then((response) => {
                     this.dataTable = response.data.data;
                  }, (error) => {

                  });
          }
        },
        beforeMount(){
            this.getData();
        }
    }
</script>

<style scoped>

</style>