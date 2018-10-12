<template>
    <div class="box">
        <notification-success v-if="notif"></notification-success>
        <div class="box-header">
            <h3 class="box-title margin-r-5">Create New Tariff</h3>
            <hr class="divider">
        </div>
        <div class="box-body">
            <form @submit.prevent="editTariff" class="form-horizontal">
                <div class="form-group">
                    <label for="vehicle" class="control-label col-md-2">Vehicle</label>
                    <div class="col-md-10">
                        <select v-model="tariff.vehicle" class="form-control" required>
                            <option value="" disabled>--select--</option>
                            <option 
                            v-for="vehicle in vehicles" 
                            v-bind:key="vehicle.id"
                            :value="vehicle.id">
                                {{ vehicle.name }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="class" class="control-label col-md-2">Classes</label>
                    <div class="col-md-10">
                        <select  id="class" v-model="tariff.classes" class="form-control" required>
                            <option value="" disabled> --select--</option>
                            <option 
                                v-for="cl in classes"
                                v-bind:key="cl.id"
                                :value="cl.id">
                                {{ cl.name }}
                            </option>
                            
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputNominal" class="control-label col-md-2">Nominal</label>
                    <div class="col-md-10">
                        <input type="number" class="form-control"  v-model="tariff.nominal" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10 col-md-offset-2">
                        <button type="submit" class="btn btn-success">Save <i class="fa fa-check"></i></button>
                        <router-link :to="{ name: 'indexTariff'}" class="btn btn-danger">Cancel <i class="fa fa-times"></i></router-link>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "editTariff",
        data(){
            return {
                tariff: {
                    vehicle: '',
                    classes: '',
                    nominal: ''
                },
                vehicles: [],
                classes: [],
                notif: false
            }
        },
        methods: {
            editTariff: function(){
                axios.put('/api/v1/tariff/' + this.$route.params.id, {tariff: this.tariff, user: this.$store.state.user.userData.name})
                    .then(response => {
                        if(response.data.status === 'success'){
                            this.notif = true;
                            setTimeout(()=>{
                                this.notif = false;
                                this.$router.push({
                                    name: 'indexTariff'
                                })
                            }, 1500)
                        }

                    }, (error => {
                        console.log(error.message);
                    }))
            },
            getDataVehicle: function(){
                axios.get('/api/v1/vehicletypes/')
                    .then(response => {
                        console.log(response.data.data.data)
                        this.vehicles = response.data.data.data;
                    })
            },
            getDataClasses: function(){
                axios.get('/api/v1/classes/')
                    .then(response => {
                        console.log(response.data.data.data)
                        this.classes = response.data.data.data;
                    })
            },
            getDataEdit: function(){
                axios.get('/api/v1/tariff/' + this.$route.params.id)
                    .then(response => {
                        // console.log(response.data.data.vehicle_id);
                        this.tariff = { 
                            vehicle: response.data.data.vehicle_types_id, 
                            classes: response.data.data.classes_id,
                            nominal: response.data.data.nominal }
                    })
            }
        },
        async activated(){
            await this.getDataEdit()
            await this.getDataVehicle();
            await this.getDataClasses();
        }
    }
</script>

<style scoped>

</style>