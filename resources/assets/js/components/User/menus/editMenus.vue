<template>
    <div class="box">
        <div class="box-body">
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="inputMenus" class="control-label col-md-2">Name of Menus</label>
                    <div class="col-md-10">
                        <input type="text" id="inputMenus" class="form-control" v-model="user.name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Child</label>
                    <div class="col-sm-10">
                        <ul class="list-group">
                            <li class="list-group-item" v-for="(sub,index) in subs" :key="sub.id"  :class="{ background: !sub.database}" >
                                {{ sub.name }} 
                                
                                <span class="pull-right" style="cursor:pointer;" @click="deleteSubMenu(index)">
                                    <i class="fa fa-times"></i>
                                </span>
                            </li>
                        </ul>
                        <input-sub v-if="showInputSubMenu" v-bind:dataSubs="subs"></input-sub>
                        <button class="btn btn-primary" type="button" @click="addSubMenu"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
               
                <div class="form-group">
                    <div class="col-md-10 col-md-offset-2">
                        <button class="btn btn-success" type="button" @click="editMenus">Save <i class="fa fa-check"></i></button>
                        <router-link :to="{ name: 'indexMenus'}" class="btn btn-warning">Cancel <i class="fa fa-times"></i></router-link>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>

    import {EventBus} from '../../../event-bus/event-bus'
    import PartInputSub from './partInputSubMenu'
    const date = new Date();

    export default {
        name: "editMenus",
        components: {
            'inputSub': PartInputSub
        },
        data: function(){
            return {
                subs: [],
                user: [],
                tempSubs: [],
                showInputSubMenu: false,
                lastId: '',
            }
        },
        mounted(){
            EventBus.$on('sentSubs', (item) => {
                this.subs.push(item.data);
                console.log(JSON.stringify(this.subs));
                this.showInputSubMenu = item.collapse;
            })
        },
        methods: {
            editMenus: function(){
                axios.put('api/v1/menus/' + this.$route.params.id, {subs:this.subs, users:this.user})
                    .then(async response => {
                        await this.getDataEdit();
                    });
                    EventBus.$emit('checkSettData', true);
            },
            getDataEdit: function(){
                axios.get('/api/v1/menus/'+ this.$route.params.id)
                    .then(response => {
                        console.log(response.data.menu);
                        const sub = response.data.menu.sub;
                        sub.forEach((item, index) => {
                            sub[index]['database'] = true;
                        });
                        this.subs = sub;
                        this.user = response.data.menu.user;
                    },(error => {
                        console.log(error.message);
                    }));
            },
            getDefaultSub: function(){
                axios.get('/api/v1/menus')
                    .then(response => {
                        this.menusDefault = response.data.menu.data;
                    }, (error => {
                        console.log(error.messages);
                    }));
            },
            deleteSubMenu: function(index){
                this.subs.splice(index, 1);
            },
            addSubMenu: function(){
                this.showInputSubMenu = true;
            },
            getLastIdMenus: function(){
                axios.get("/api/v1/get-last-id/")
                    .then( response => {
                        this.lastId = response.data.id;
                    }, error => {

                    })
            },
            
        },
        activated(){
            this.getDataEdit();
            this.getDefaultSub();
            this.getLastIdMenus();
        }
    }
</script>

<style lang="scss">
    .background {
        background-color: #db5e5e
    }
</style>