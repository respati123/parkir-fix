<template>
    <div>
        <notification-success v-if="notif"></notification-success>
        <div class="box">
            <div class="box-body">
                <form @submit.prevent="addLocation" class="form-horizontal">
                    <div class="form-group">
                        <label for="inputNameLocation" class="control-label col-md-2">Locations</label>
                        <div class="col-md-10">
                            <input type="text" v-model="location.name" class="form-control" placeholder="input location">
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
        name: "createLocation",
        data(){
            return {
                location: {
                    name:''
                },
                notif: false
            }
        },
        methods: {
            addLocation: function(){
                axios.post('/api/v1/location', this.location)
                    .then(res => {
                        // if(res.data.status === 'success'){
                            this.notif = true
                            setTimeout(() => {
                                this.notif = false;
                                this.location.name = ''
                            }, 2000)
                        // }
                    })
            }
        }
    }
</script>

<style scoped>

</style>