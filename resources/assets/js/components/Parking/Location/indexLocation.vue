<template>
    <div>
        <div class="box">
            <div class="box-header">
                <span class="fa fa-gear"></span>
                <h3 class="box-title margin-r-5">Location Programs</h3>
                <router-link class="btn btn-primary pull-right" :to="{ name: 'createLocation'}">Create new Location</router-link>
                <hr class="divider">
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Locations List</th>
                            <th>Execute</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="table in dataTable" v-bind:key="table.id">
                            <td>{{ table.name }}</td>
                            <td>
                                <router-link class="btn btn-warning btn-margin" :to="{ name : 'editLocation', params: { id : table.id}}">Edit <i class="fa fa-pencil"></i></router-link>
                                   <button type="button" class="btn btn-danger btn-margin" @click="deleteItem(table.id)"><i class="fa fa-trash"></i>Delete</button>                                                                  
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "indexLocation",
        data(){
            return {
                dataTable: []
            }
        },
        methods: {
            getDataTable: function(){
                axios.get('/api/v1/location')
                    .then(response => {
                        console.log(response.data.data.data);
                        this.dataTable = response.data.data.data;
                    })
            },
            deleteItem(item){
                    const conf = confirm("are you sure?");
                    if(conf){
                    axios.delete('/api/v1/location/' + item)
                         .then(res => {
                              this.getDataTable();
                         })
                    } else {
                         alert('cancel')
                    }
               }
        },
        mounted(){
            this.getDataTable();
        }
    }
</script>

<style scoped>
</style>