<template>
    <div>
        <div class="box">
            <div class="box-header">
                <span class="fa fa-gear"></span>
                <h3 class="box-title margin-r-5">Loyaty Programs</h3>
                <router-link class="btn btn-primary pull-right" :to="{ name : 'createLoyalty'}">Create New Loyalty</router-link>
                <hr class="divider">
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Loyalty Program List</th>
                            <th>Happening In</th>
                            <th>Execute</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                               <div class="box-list">
                                   <div class="box-list-img">
                                       <img src="public/images/icon__person.png" alt="">
                                       <p>Active</p>
                                   </div>
                                   <div class="box-list-desc">
                                       <h3>PROMO asdasdsa</h3>
                                       <p>asdasdasd asd </p>
                                   </div>
                               </div>
                            </td>
                            <td>
                                <div class="happening-in">
                                    <h4>10 May 2018 15 May 2018</h4>
                                    <p>Mall Arion, Mall Ambasador, Mall Taman Anggrek</p>
                                </div>

                            </td>
                            <td>
                                <div class="coloum-button-list">

                                    <router-link class="btn btn-warning" :to="{ name : 'editLoyalty', params: { id : '123'}}">Edit <i class="fa fa-pencil"></i></router-link>
                                    <router-link class="btn btn-danger" :to="{ name : 'editListCustomers', params: { id : '123'}}">Delete <i class="fa fa-pencil"></i></router-link>

                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "indexLoyalty",
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

    .happening-in i {
        color: #903;
        float: left;
        font-family: Georgia;
        font-size: 75px;
        line-height: 60px;
        padding-top: 4px;
        padding-right: 8px;
        padding-left: 3px;
    }

    .happening-in p {
        font-size: 12px;
    }

    .coloum-button-list {
        display: inline-flex;
        padding: 30px 0;

    }


</style>