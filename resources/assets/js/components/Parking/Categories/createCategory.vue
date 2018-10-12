<template>
    <div>
        <notification-success v-if="notif"></notification-success>
        <div class="box">
            <div class="box-body">
                <form class="form-horizontal" @submit.prevent="addCategory">
                    <div class="form-group">
                        <label for="inputCategory" class="control-label col-md-2">Category</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" v-model="categories.name" id="inputCategory">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription" class="control-label col-md-2">Description</label>
                        <div class="col-md-10">
                            <textarea  id="inputDescription" cols="8" rows="4" v-model="categories.description" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-2">
                            <button type="submit" class="btn btn-success">Save <i class="fa fa-check"></i></button>
                            <router-link class="btn btn-danger" :to="{ name: 'indexCategory'}">Cancel <i class="fa fa-times"></i></router-link>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: 'createCategory',
        data(){
            return {
                categories: {
                    name: '',
                    description: ''
                },
                notif: false
            }
        },
        methods: {
            addCategory: function(){
                axios.post('/api/v1/categories/', this.categories)
                    .then(response => {
                        // console.log(response.data.status);
                        if(response.data.status === "success"){
                            this.notif = true;
                            this.categories = {name:'',description:''}
                            setTimeout(() => {
                                this.notif = false;
                               
                            },1500);
                        }
                    });
                // console.log(JSON.stringify(this.categories));
            }
        }

    }
</script>

<style scoped>

</style>