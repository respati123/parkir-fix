<template>
    <div>
        <div class="box">
            <div class="box-body">
                <form @submit.prevent="addLoyalty" class="form-horizontal">
                    <div class="form-group">
                        <label for="inputPromo" class="control-label col-sm-2">Name of Promo</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPromo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Date</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-md-4">
                                    <label  class="col-sm-2 control-label">From</label>
                                    <div class="col-md-10">
                                        <input type="date" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label  class="col-sm-2 control-label">To</label>
                                    <div class="col-md-10">
                                        <input type="date" class="form-control" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription" class="control-label col-md-2">Description</label>
                        <div class="col-md-10">
                            <textarea  id="inputDescription" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputLocation" class="control-label col-md-2">Location</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="inputLocation">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-2">
                            <button class="btn btn-success" type="submit">Save <i class="fa fa-check"></i></button>
                            <router-link :to="{ name : 'indexLoyalty'}" class="btn btn-danger">Cancel <i class="fa fa-times"></i></router-link>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "createLoyalty"
    }
</script>

<style scoped>

</style>