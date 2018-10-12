<template>
    <div>
        <div class="box">
            <div class="box-header">
                <span class="fa fa-gear"></span>
                <h3 class="box-title margin-r-5">Tariff</h3>
                <router-link :to="{ name: 'createTariff'}" class="btn btn-primary pull-right">Create new Tariff</router-link>
                <hr class="divider">
            </div>
            <div class="box-body">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>Vehicle Types</th>
                            <th>Classes</th>
                            <th>Nominal</th>
                            <th>Execute</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="table in dataTable" v-bind:key="table.id">
                            <td>{{ table.vehicle_types['name'] }}</td>
                            <td>{{ table.classes['name'] }}</td>
                            <td>{{ table.nominal }}</td>
                            <td>
                                <router-link :to="{name: 'editTariff', params: {id: table.id}}" class="btn btn-warning">Edit <i class="fa fa-pencil"></i></router-link>
                                <button class="btn btn-danger" @click="deleteItem(table.id)">Delete <i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <pre>{{ dataTable }}</pre>
            </div>
        </div>
    </div>
</template>

<script>
    
    import GeneralSettings from '../../General/GeneralSettings.vue'

    export default {
        name: "indexTariff",
        components: {
            'generalsettings': GeneralSettings
        },
        data(){
            return {
                dataTable: []
            }
        },
        methods:{
            getDataTable: function(){
                axios.get('/api/v1/tariff')
                    .then(response => {
                        // console.log(response)
                        this.dataTable = response.data.data.data;
                        console.log(this.dataTable);
                    })
            },
            deleteItem(item){
                const conf = confirm('are you sure?')
                if(conf){
                    axios.delete('/api/v1/tariff/' + item)
                        .then(res => {
                            this.getDataTable();
                        })
                }
                
            }
        },
        async activated(){
            await this.getDataTable();
        }
    }
</script>

<style scoped>

</style>