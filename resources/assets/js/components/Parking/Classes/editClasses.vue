<template>
    <div>
        <div class="box">
            <div class="box-body">
                <form @submit.prevent="editClasses" class="form-horizontal">
                    <div class="form-group">
                        <label for="inputClasses" class="control-label col-md-2">Classes</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" v-model="classes.name" id="inputClasses">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDesc" class="control-label col-md-2">Description</label>
                        <div class="col-md-10">
                            <textarea  id="inputDesc" cols="8" rows="4" class="form-control" v-model="classes.description"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-2">
                            <button class="btn btn-success" type="submit">Save <i class="fa fa-check"></i></button>
                            <router-link :to="{ name: 'indexClasses'}" class="btn btn-danger">Cancel <i class="fa fa-times"></i></router-link>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default  {
        name: 'editClasses',
        data: function(){
            return {
                classes: {
                    name: '',
                    description: ''
                }
            }
        },
        methods: {
            editClasses: function(){
                axios.put('/api/v1/classes/' + this.$route.params.id, this.classes)
                    .then(response => {
                        console.log(response.data.status);
                        if(response.data.status === "success"){
                            this.notif = true;
                            setTimeout(() => {
                                this.notif = false;
                                this.$router.push({
                                    name: 'indexClasses'
                                })
                            }, 1500)
                            
                        }
                    });
            },
            getDataEdit: function(){
                axios.get('/api/v1/classes/' + this.$route.params.id)
                    .then(response => {
                        // console.log(response.data.data);
                        return this.classes = {name: response.data.data.name, description: response.data.data.description}
                    })
            }
        },
        activated(){
            this.getDataEdit();
        }
    }
</script>

<style scoped>

</style>