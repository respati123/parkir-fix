<template>
    <div>
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Permissions Edit</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Permissions name</label>

                            <div class="col-sm-10">
                                <input class="form-control" v-model="permission.name" id="inputName" placeholder="Permissions" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button class="btn btn-primary" type="button" @click.prevent="updateData">save</button>
                                <button class="btn btn-warning" type="button" @click.prevent="permissionBack">Back</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </form>
            </div>
            <!-- /.box -->

        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        name: "permissionsEdit",
        mounted() {
            this.id = this.$route.params.id;
            axios.get('/api/v1/permissions/' + this.id)
                .then((response) => {
                   this.permission.name = response.data.data.name;
                   console.log(response.data.data.name);
                });

        },
        data: function(){
            return {
                permissionId: null,
                permission: {
                    name: ''
                },
                id: null

            }
        },
        methods: {
            permissionBack: function(){
                this.$router.push({
                    name: 'indexPermissions',
                })
            },
            updateData(){

                axios.put('/api/v1/permissions/' + this.id, this.permission)
                    .then((response) => {
                        this.$router.push({
                            name: 'indexPermissions',
                            params: {
                                alertMessage: response.data.message,
                                alertSuccess: true
                            }
                        })
                    }, (error) => {
                        console.log(error.message);
                    });
            }
        }
    }
</script>

<style scoped>

</style>