<template>
    <div>
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Permissions</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" @submit.prevent="saveData" >
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Permissions name</label>

                            <div class="col-sm-10">
                                <input class="form-control" v-model="permission.name" id="inputName" placeholder="Permissions" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button class="btn btn-primary" type="submit">save</button>
                                <button class="btn btn-warning" type="button" :onclick="permissionBack">Back</button>
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
    import axios from 'axios'

    export default {
        name: "permissionsCreate",
        data() {

            return {
                app: this,
                permission: { name: '' }
            }
        },
        methods: {
            saveData: function(){
                console.log('masuk sini');
                axios.post("/api/v1/permissions", this.permission)
                    .then((response) => {
                        console.log(response.data);
                        let message = response.data.messages;
                        this.$router.push({
                            name: 'indexPermissions',
                            params: {
                                alertBoolean: true,
                                alertMessage: message
                            }
                        });
                        console.log(response);
                    }, (error) => {
                        console.log(error.messages);
                    });
            },
            permissionBack: function(){
                this.$router.push({
                    name: 'indexPermissions'
                });
            }
        },
    }
</script>

<style scoped>

</style>