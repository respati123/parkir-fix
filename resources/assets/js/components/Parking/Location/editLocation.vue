<template>
    <div>
        <div class="box">
            <notification-success v-if="notif"></notification-success>
            <div class="box-body">
                <form @submit.prevent="editLocation" class="form-horizontal">
                    <div class="form-group">
                        <label for="inputNameLocation" class="control-label col-md-2">Locations</label>
                        <div class="col-md-10">
                            <input type="text" v-model="locations.name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-2">
                            <button type="submit" class="btn btn-success">Save <i class="fa fa-check"></i></button>
                            <router-link class="btn btn-danger" :to="{ name: 'indexLocation'}">Cancel <i class="fa fa-times"></i></router-link>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "editLocation",
        data(){
            return {
                locations: {
                    name: ''
                },
                notif: false
            }
        },
        methods: {
            getDataEdit(){
                axios.get('/api/v1/location/' + this.$route.params.id)
                    .then(response => {
                        console.log(response.data);
                        this.locations.name = response.data.data.name
                    })
            },
            editLocation: function(){
                axios.put('/api/v1/location', this.locations)
                    .then(response => {
                        if(response.data.status === "success"){
                            this.notif = true
                            setTimeout(() => {
                                this.notif = false
                                this.$router.push({
                                    name: 'indexLocation'
                                })
                            }, 1500)
                        }
                    })
            }
        }, 
        async activated(){
            await this.getDataEdit();
        }
    }
</script>

<style scoped>

</style>