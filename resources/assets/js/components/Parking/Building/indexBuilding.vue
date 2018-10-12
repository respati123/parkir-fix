<template>
    <div class="box">
        <div class="box-header">
            <span class="fa fa-gear"></span>
            <h3 class="box-title margin-r-5">Buildings Programs</h3>
            <router-link :to="{ name: 'createBuilding'}" class="btn btn-primary pull-right">Create New Buildings</router-link>
            <hr class="divider">
        </div>
        <div class="box-body">
            <table class="table table-responsive table-bordered">
                <thead>
                <tr>
                    <th>Name Building</th>
                    <th>category</th>
                    <th>Location</th>
                    <th>Slots</th>
                    <th>Tariffs</th>
                    <th>Execute</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        
                    </td>
                    <td>
                           
                    </td>
                    <td>
                        
                    </td>           
                    <td>
                       
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        name:'indexBuilding',
        data(){
            return {

            }
        },
        methods: {
            getDataTable: function(){
                axios.get('/api/v1/building')
                    .then(response => {
                        console.log(response);
                    })
            }
        },
        mounted(){
            this.getDataTable();
        }
    }
</script>

<style scoped>
    .coloum-button-list {
        display: inline-flex;
        padding: 30px 0;
    }
    .btn-margin {
        margin-right: 10px;
    }


    .box-list-slot {
        width: 40%;
    }
</style>