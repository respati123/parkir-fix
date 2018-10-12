<template>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title margin-r-5">Data Table With Full Features</h3>
            <router-link class="btn btn-primary pull-right" :to="{ name : 'createPermissions'}">Create New Permissions</router-link>
            <hr class="divider">
        </div>
        <div>
            <my-vuetables :url="url" :field="fields"></my-vuetables>
        </div>
        <div class="alert-top alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{ messages === undefined ? '' : messages}}</strong> Indicates a successful or positive action.
        </div>

        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">View {{ dataView.titleModal }} </h4>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <tbody><tr>
                                <th style="width:50%">Name</th>
                                <td>{{ dataView.name }}</td>
                            </tr>
                            <tr>
                                <th>CreateddAt</th>
                                <td>{{ dataView.createdAt }}</td>
                            </tr>
                            <tr>
                                <th>CreatedBy</th>
                                <td>{{ dataView.createdBy }}</td>
                            </tr>
                            <tr>
                                <th>ModifierAt</th>
                                <td>{{ dataView.modifierAt}}</td>
                            </tr>
                            <tr>
                                <th>ModifierBy</th>
                                <td>{{ dataView.modifierBy}}</td>
                            </tr>
                            </tbody></table>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

    </div>

</template>

<script>

    import axios from 'axios'
    import MyVuetables from "../../dataTables/MyVuetables";
    import Vue from 'vue'

    export default {
        name: "permissionsIndex",
        components: {MyVuetables},
        data() {
            return {
                alertSuccess: false,
                url: 'http://127.0.0.1:8000/api/v1/permissions',
                permissionData: [],
                fields: [
                    {
                        name: '__component:custom-actions',
                        title: 'Actions',
                        titleClass: 'center aligned',
                        dataClass: 'center aligned'
                    },
                    {
                        name: 'name',
                    },
                    {
                        name: 'created_at',
                        title: 'createdAt'
                    },
                    {
                        name: 'created_by'
                    },
                    {
                        name: 'modifier_at'
                    },
                    {
                        name: 'modifier_by'
                    },
                ],
                results: [
                    {
                        name: 'respati',
                        kelas: 1,
                    },
                    {
                        name: 'respati',
                        kelas: 1,
                    }
                ],
                messages: '',
                dataView: {
                    name: '',
                    createdAt: '',
                    createdBy: '',
                    modifierAt: '',
                    modifierBy: '',
                    id: ''

                },
                indexing: null
            }
        },
        methods: {
            actionDataTables(action, data, index){
                switch (action) {
                    case 'view-item':
                        let indexTemp = null;
                        if(indexTemp === index){
                            return;

                        } else {
                            $('#modal-default').modal().show();
                            axios.get("api/v1/permissions/", data)
                                .then((response) => {
                                    console.log(response.data.data[index]);
                                    let temp = response.data.data[index];
                                    this.dataView.id = temp.id;
                                    this.dataView.name = temp.name;
                                    this.dataView.createdAt = temp.created_at;
                                    this.dataView.createdBy = temp.created_by;
                                    this.dataView.modifierAt = temp.modifier_at;
                                    this.dataView.modifierBy = temp.modifier_by;
                                });
                            indexTemp = index;
                        }
                        return;

                    case 'edit-item':
                        console.log('masuk edit');
                        this.$router.push({
                            name: 'editPermissions',
                            params: {
                                id: data
                            }
                        });
                        break;
                    case 'delete-item':
                        axios.delete('/api/v1/permissions/' + data)
                            .then((response) => {
                               location.reload();
                            },(error) => {

                            });
                        // this.indexing = index;
                        // console.log(this.indexing);
                        // let tempIndex = this.indexing;
                        // if(tempIndex === index){
                        //     console.log('tidak sama');
                        // } else {
                        //     // let con = confirm("Are you sure want delete this Data");
                        //     // if(con){
                        //     //     axios.delete('api/v1/permissions/' + data)
                        //     //         .then((response) => {
                        //     //             if(response.data.messages === "success delete"){
                        //     //                 Vue.nextTick( () => this.$refs.vuetable.refresh());
                        //     //             }
                        //     //         }, (error) => {
                        //     //             console.log(error.message);
                        //     //         });
                        //     // }
                        //     console.log('sama');
                        // }

                        break;
                    default:
                        break;
                }
            },
            getRefresh: function(){

                Vue.nextTick(() => this.$refs.vuetable.refresh());
            }
        },
        mounted() {
            console.log(this.$router.params);
            if(!this.$router.params === undefined) {
                this.alertSuccess = this.$router.params.alertBoolean;
                this.messages = this.$router.params.alertMessage;
            }
            console.log(this.alertSuccess + "," + this.messages);
            this.$events.$on('itemAction', eventData => {
                this.actionDataTables(eventData.action, eventData.data.id, eventData.index);
            });

            axios.get("api/v1/permissions")
                .then((response) => {
                    console.log(response.data);
                    this.results = response.data.permissions;
                }, (error) => {
                    console.log(error.message);
                });


        },


    }
</script>

<style scoped>

</style>