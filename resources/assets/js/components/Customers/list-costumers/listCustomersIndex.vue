<template>
    <div class="box">
        <div class="box-header">
            <span class="fa fa-gear"></span>
            <h3 class="box-title margin-r-5">List Customers</h3>
            <router-link class="btn btn-primary pull-right" :to="{ name : 'createListCustomers'}">Create New Customers</router-link>
            <hr class="divider">
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th><center>Customer List</center></th>
                        <th><center>List Of Vehicles</center></th>
                        <th><center>Execute</center></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="list-customers">
                                <div class="img-list">
                                    <img src="public/images/icon__person.png" alt="Person">
                                    <p>Active</p>
                                </div>
                                <div class="desc-list">
                                    <h4>Respati tri susetyo</h4>
                                    <p>+621234567890 | <span class="list-email">someemail.gmail.com</span> </p>
                                    <p class="list-regis">Registered: 20 Apr 2018</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="vehicles">
                                <div class="list-vehicles">
                                    <span><i class="fa fa-car fa-list"></i></span>
                                    <div class="list-vehicles-desc">
                                        <p>B 1245 DE </p>
                                        <p>BMW Series</p>
                                    </div>
                                </div>
                                <div class="list-vehicles">
                                    <span><i class="fa fa-car fa-list"></i></span>
                                    <div class="list-vehicles-desc">
                                        <p>B 1245 DE </p>
                                        <p>BMW Series</p>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="coloum-button-list">
                                <router-link class="btn btn-warning btn-margin" :to="{ name : 'editListCustomers', params: { id : '123'}}">Edit <i class="fa fa-pencil"></i></router-link>
                                <button class="btn btn-danger btn-margin">Delete <i class="fa fa-times"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>

        </div>
        <div class="alert-top alert alert-success" v-if="alertSuccess">
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
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

    </div>
</template>

<script>
    import MyVuetables from "../../dataTables/MyVuetables"
    import Vue from 'vue'

    export default {
        name: "listCustomersIndex",
        components: {MyVuetables},
        data() {
            return {
                fields: [],
                url: '',
                messages: '',
                dataView: [],
                alertSuccess: false,
                alertMessage: '',
            }
        },
        mounted:  function(){

           if(this.$route.params.alertSuccess !== undefined){

               console.log(this.alertSuccess);
               this.alertSuccess = this.$route.params.alertSuccess;
               setTimeout(function(){
                   
               });
               this.alertSuccess = false;


           }
        },
    }
</script>

<style scoped>
    .list-customers {
        display: flex;
        padding: 10px;
        margin: auto;
        width: 100%;
    }
    .img-list {
        padding: 5px;
        margin-right: auto;
        margin-left: auto;
        width: 25%;
        position: relative;

    }
    .img-list img {
        height: auto;
        display: block;
    }

    .desc-list {
        display: block;
        width: 100%;
        padding: 5px;
        margin-left: 15px;
    }
    .desc-list h4 {
        font-size: 28px;
        margin: 0;
    }
    .desc-list p {
        margin: 0;
    }

    .list-email {
        color: #00FFFF;
    }
    .list-regis{
        font-style: italic;
        color: #4b646f;
    }
    .img-list p {
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

    .vehicles {
        display: grid;
        grid-template-columns: auto auto;
        padding: 10px;

    }

    .list-vehicles {
        background-color: rgba(255, 255, 255, 0.8);
        padding: 10px;
        text-align: center;
        display: inline-flex;
        width: auto;
    }

    .list-vehicles span {
        margin: auto 5px;
    }

    .list-vehicles-desc {
        padding: 10px
    }

    .list-vehicles-desc p:first-child {
        margin: 0;
        font-style: normal;
        font-size: 23px;
    }

    .fa-list{
        font-size: 40px;
    }

    .coloum-button-list {
        display: inline-flex;
        padding: 30px 0;

    }

    .coloum-button-list button {
        margin: 0 12px;
    }



    @media screen and (max-width: 1000px) {
       .img-list {
           width: 100%;
       }
    }

    @media screen and (max-width: 1300px) {
        .img-list {
            width: 50%;
        }

        .vehicles {
            width: auto;
        }
    }

    @media screen and (min-width: 800px) {

    }
</style>