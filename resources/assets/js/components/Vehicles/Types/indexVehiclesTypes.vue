<template>
    <div>
        <div class="box">
            <div class="box-header">
                <span class="fa fa-gear"></span>
                <h3 class="box-title margin-r-5">Vehicle Type Programs</h3>
                <router-link :to="{ name: 'createVehicleTypes'}" class="btn btn-primary pull-right">Create New Vehicle Types</router-link>
                <hr class="divider">
            </div>
            <div class="box-body">
                <table class="table table-responsive table-bordered">
                    <thead>
                        <tr>
                            <th>Vehicle Types List</th>
                            <th>Descriptions</th>
                            <th>Execute</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="types in tableTypes" v-bind:key="types.id">
                            <td>
                                {{ types.name}}
                            </td>
                            <td>
                                {{ types.description}}
                            </td>
                            <td>
                                <router-link :to="{ name: 'editVehicleTypes', params:{id: types.id}}" class="btn btn-warning btn-margin">Edit <i class="fa fa-pencil"></i></router-link>
                                <button class="btn btn-danger btn-margin" @click="deleteItem(types.id)">Delete <i class="fa fa-times"></i></button>
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
        name: "indexVehiclesTypes",
        data(){
            return {
                tableTypes: []
            }
        },
        methods: {
            getDataTable: function(){
                axios.get('/api/v1/vehicletypes')
                    .then(response => {
                        // console.log(response.data.data.data);
                        this.tableTypes = response.data.data.data;
                    })
            },
            deleteItem: function(item){
                const confirm = confirm('apakah ingin di delete?');
                if(confirm){
                    axios.delete('/api/v1/vehicletypes/'+ item)
                    .then(res => {
                       return;
                    })
                }
            }
        },
        activated(){
            this.getDataTable();
        }
    }
</script>

<style scoped>


</style>