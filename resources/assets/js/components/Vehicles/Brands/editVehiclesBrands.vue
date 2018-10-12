<template>
    <div class="box">
        <div class="box-body">
            <form @submit.prevent="addVehicleBrands" class="form-horizontal">
                <div class="form-group">
                    <label for="inputBrands" class="control-label col-md-2">Vehicle Brands</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="inputBrands">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputTypes" class="control-label col-md-2">Vehicle Types</label>
                    <div class="col-md-10">
                        <select  id="inputTypes" class="form-control">
                            <option value="Mobil">Mobil</option>
                            <option value="Mobil">Motor</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10 col-md-offset-2">
                        <button type="submit" class="btn btn-success btn-margin">Save <i class="fa fa-check"></i></button>
                        <router-link :to="{ name: 'indexVehicleBrands'}" class="btn btn-danger btn-margin">Cancel <i class="fa fa-times"></i></router-link>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "editVehiclesBrands"
    }
</script>

<style scoped>

</style>