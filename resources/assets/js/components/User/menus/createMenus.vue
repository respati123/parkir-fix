<template>
    <div class="box">
        <div class="box-body">
            <form @submit.prevent="addMenus" class="form-horizontal">
                <div class="form-group">
                    <label for="inputMenus" class="control-label col-md-2">Name of Menus</label>
                    <div class="col-md-10">
                        <input type="text" id="inputMenus" class="form-control" v-model="menus.name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inpuParent" class="control-label col-md-2">Parent Menus</label>
                    <div class="col-md-10">
                        <select  id="inpuParent" class="form-control" v-model="menus.value">
                            <option value="" disabled> please choose</option>
                            <option value="-1"> tidak ada parent </option>
                            <option 
                            v-for="subs in subMenus" 
                            v-if="subs.parent_id === -1" 
                            v-bind:key="subs.id" 
                            :value="subs.value">
                                {{ subs.name }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10 col-md-offset-2">
                        <button class="btn btn-success" type="submit">Save <i class="fa fa-check"></i></button>
                        <router-link :to="{ name: 'indexMenus'}" class="btn btn-warning">Cancel <i class="fa fa-times"></i></router-link>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>

    import axios from 'axios'
    export default {
        name: "createMenus",
        data: function(){
            return {

                menus: {
                    name: '',
                    value: ''
                },
                subMenus: []
            }
        },
        methods: {
            addMenus: function(){
                axios.post('/api/v1/menus/', this.menus)
                    .then(response => {
                        setTimeout(() => {
                            this.$router.push({
                                name: 'indexMenus'
                            });
                        }, 1000);
                    }, (error => {
                        console.log(error.message)
                    }));
            },
            menusDefault: function(){
                axios.get('/api/v1/menus/')
                    .then(response => {
                        let temp = response.data.menu.data;
                        temp.forEach(item => {
                            this.subMenus.push({name: item.name, value: item.id, parent_id: item.parent_id});
                        })
                    }, (error => {
                        console.log(error.messages);
                    }));
            }
        },
        beforeMount(){
            this.menusDefault();
        }
    }
</script>

<style scoped>

</style>