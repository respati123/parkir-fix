<template>
    <div>
        <transition name="fade">
            <notification-success v-if="notif"></notification-success>
        </transition>
        

        <div class="box">
            <div class="box-body">
                <form @submit.prevent="addClasses" class="form-horizontal">
                    <div class="form-group">
                        <label for="inputClasses" class="control-label col-md-2">Classes</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" v-model="classes.name" id="inputClasses">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDesc" class="control-label col-md-2">Description</label>
                        <div class="col-md-10">
                            <textarea  id="inputDesc" cols="8" rows="4" v-model="classes.description" class="form-control"></textarea>
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
        name: 'createClasses',
        data: function(){
            return {
                classes: {
                    name:'',
                    description: ''
                },
                notif: false
            }
        },
        methods: {
            addClasses: function(){
                axios.post('/api/v1/classes', this.classes)
                    .then(response => {
                        this.notif = true;
                        setTimeout(() => {
                            this.notif = false;
                        },3000)
                        this.classes.name = ''
                        this.classes.description = ''
                    });
            }
        }
    }
</script>

<style scoped>
    .box-list-img p {
        position: absolute;
        right: 0;
        bottom: 0;
        background: red;
        padding: 5px;
        font-size: 12px;
        color: #ffffff;
        border-radius: 10px;
        display: inline-block;
    }
    .box-list {
        width: 100%;
        height: auto;
        padding: 5px;
        display: inline-flex;

    }

    .box-list-img {
        margin-right: 10px;
        width: 100px;
        display: block;
        position: relative;
    }

    .box-list-desc {
        width: auto;
        padding: 10px;
        display: block;
    }

    .box-list-desc h3, p {
        margin: 0;
        font-size: 5.9vw;
    }
    .box-list-desc p {

        font-size: 18px;
        color: #2c3b41;
        font-style: italic;

    }
    .box-list-desc h3 {

        font-size: 24px;
        font-variant: all-petite-caps;

    }
</style>