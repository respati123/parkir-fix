<template>

        <div>
            <form class="form-horizontal"  @submit.prevent="editCustomers">
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>

                        <div class="col-sm-10">
                            <input class="form-control" id="inputName" v-model="customer.name" placeholder="Name" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-10">
                            <input class="form-control" id="inputEmail" placeholder="email" type="email" v-model="customer.email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPhone" class="col-sm-2 control-label">Phone</label>

                        <div class="col-sm-10">
                            <input class="form-control" id="inputPhone" v-model="customer.phone" placeholder="phone" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputVehicles" class="col-sm-2 control-label">Vehicles Type</label>

                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-md-4">
                                    <label  class="col-sm-2 control-label">Types</label>
                                    <div class="col-md-10">
                                        <select class="form-control select2 select2-hidden-accessible no-margin" v-model="customer.phone" style="width: 100%;" tabindex="-1" aria-hidden="true" id="inputVehicles">
                                            <option value="bmw">Mobil</option>
                                            <option value="bmw">Motor</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label  class="col-sm-2 control-label">Brands</label>
                                    <div class="col-md-10">
                                        <select v-model="customer.brands" class="form-control select2 select2-hidden-accessible  no-margin" style="width: 100%;" tabindex="-1" aria-hidden="true" >
                                            <option value="bmw">BMW</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4" style="margin-left: 0;">
                                    <label  class="col-sm-2 control-label">Plat</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" v-model="customer.plat" name="plat">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button class="btn btn-default btn-lg">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <hr class="divider">
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button class="btn btn-success" type="submit">
                                Save
                                <i class="fa fa-check"></i>
                            </button>
                            <router-link :to="{ name : 'indexListCustomers'}" class="btn btn-danger">Cancel <i class="fa fa-times"></i></router-link>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->

            </form>
        </div>

</template>

<script>
    export default {
        name: "listCustomersEdit",
        data: function(){
            return {
                customer: {

                }
            }
        },
        methods: {
            editCustomers: function(){

            }
        }
    }
</script>

<style scoped>

</style>