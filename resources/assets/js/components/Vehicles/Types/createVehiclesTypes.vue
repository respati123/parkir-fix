<template>
    <div class="box">
        <notification-success v-if="notif"></notification-success>
        <div class="box-body">
            <form @submit.prevent="addVehicleTypes" class="form-horizontal">
                <div class="form-group">
                    <label for="inputVehicles" class="control-label col-md-2">Name of Vehicle Types</label>
                    <div class="col-md-10">
                        <input type="text" id="inputVehicles" v-model="types.name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputDesc" class="control-label col-md-2">Descriptions</label>
                    <div class="col-md-10">
                        <textarea id="inputDesc" rows="4" cols="4" v-model="types.description" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10 col-md-offset-2">
                        <button type="submit" class="btn btn-success">Save <i class="fa fa-check"></i></button>
                        <router-link :to="{ name: 'indexVehicleTypes'}" class="btn btn-danger">Cancel <i class="fa fa-times"></i></router-link>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "createVehiclesTypes",
        data(){
            return {
                notif: false,
                types: {
                    name: '',
                    description: ''
                }
            }
        },
        methods: {
            addVehicleTypes: function(){
                this.notif = true
                axios.post('/api/v1/vehicletypes', this.types)
                    .then(response => {
                        if(response.data.status === "success"){
                            this.types = {name: '', description: ''}
                            setTimeout(() => {
                                this.notif = false
                            }, 2000);
                        }
                    })
            }
        }
    }
</script>

<style scoped>

</style>