<template>
    <div class="box">
        <div class="box-header">
            <span class="fa fa-gear"></span>
            <h3 class="box-title margin-r-5">Vehicles Brands</h3>
            <router-link :to="{ name: 'createVehicleBrands'}" class="btn btn-primary pull-right">Create new Vehicles Brands</router-link>
            <hr class="divider">
        </div>
        <div class="box-body">
            <table class="table table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>Vehicles Brands List</th>
                        <th>Vehicles Types</th>
                        <th>Execute</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="box-list">
                                <div class="box-list-img">
                                    <img src="/public/images/icon__person.png" alt="">
                                    <p>Active</p>
                                </div>
                                <div class="box-list-desc">
                                    <h2>BMW</h2>
                                    <p>
                                        Adalah [kendaraan] darat yang digerakkan oleh tenaga mesin, beroda
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <h2>Mobil</h2>
                        </td>
                        <td>
                            <router-link :to="{ name: 'editVehicleBrands'}" class="btn btn-warning btn-margin">Edit <i class="fa fa-pencil"></i></router-link>
                            <button class="btn btn-danger btn-margin">Delete <i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        name: "indexVehiclesBrands"
    }
</script>

<style scoped>

</style>