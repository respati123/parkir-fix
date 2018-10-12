<template>
     <div class="box">
          <div class="box-header">
               <span class="fa fa-gear"></span>
               <h3 class="box-title margin-r-5">Vouchers</h3>
               <router-link :to="{name: 'createVoucher'}" class="btn btn-primary pull-right">Create New Voucher</router-link>
               <hr class="divider">
          </div>
          <div class="box-body">
               <table class="table table-responsive table-bordered">
                    <thead>
                         <tr>
                              <th>Name of Voucher</th>
                              <th>Discount</th>
                              <th>execute</th>
                         </tr>
                    </thead>
                    <tbody>
                         <tr v-for ="datas in dataTable" v-bind:key="datas.id">
                              <td>{{datas.name}}</td>
                              <td>{{datas.nominal}}</td>
                              <td>
                                   <router-link :to="{ name: 'editVoucher', params: {id: datas.id}}" class="btn btn-warning">Edit <i class="fa fa-pencil"></i></router-link>
                                   <button type="button" class="btn btn-danger">Delete <i class="fa fa-trash"></i></button>
                              </td>
                         </tr>
                    </tbody>
               </table>
          </div>
     </div>
</template>
<script>
     export default {
          name: 'indexVoucher',
          data(){
               return {
                    dataTable : [
                         {name: 'diskon 10000', nominal: 10000, id: 1},
                         {name: 'diskon 5000', nominal: 5000, id: 2},
                         {name: 'diskon 20000', nominal: 20000, id: 3},
                    ]
               }
          }
     }
</script>
<style scoped>

</style>
