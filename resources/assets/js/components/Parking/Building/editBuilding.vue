<template>
    <div class="box">
        <div class="box-body">
            <form @submit.prevent="editBuilding" class="form-horizontal">
                <div class="form-group">
                    <label for="inputBuilding" class="control-label col-md-2">Name Of Building</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="inputBuilding">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputCategories" class="control-label col-md-2">Categories</label>
                    <div class="col-md-10">
                        <select id="inputCategories" class="form-control">
                            <option value="kategori">Perkantoran</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Classes</label>
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="inputRegular" class="col-md-2 control-label">Regular</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="inputRegular">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputVIP" class="col-md-2 control-label">VIP</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="inputVIP">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputVVIP" class="col-md-2 control-label">VVIP</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="inputVVIP">
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-2">
                            <button class="btn btn-success" type="submit">Save <i class="fa fa-check"></i></button>
                            <router-link :to="{ name: 'indexBuilding' }" class="btn btn-danger">Cancel <i class="fa fa-times"></i></router-link>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'editBuilding',
        data: function(){
            return {

            }
        },
        methods: {
            editBuilding: function(){

            }
        }
    }
</script>

<style scoped>

</style>