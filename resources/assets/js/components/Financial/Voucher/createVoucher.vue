<template>
     <div class="box">
          <div class="box-header">
               <h3 class="box-title margin-margin-r-5">Create New Voucher</h3>
          </div>
          <div class="box-body">
               <form @submit.prevent="addVoucher" class="form-horizontal">
                    <div class="form-group">
                         <label for="" class="control-label col-md-2">Name Of Vouchers</label>
                         <div class="col-md-10">
                              <div class="checkbox">
                                   <label>
                                   <input type="radio" value="discount" v-model="typeOf">
                                   Discount
                                   </label>
                              </div>
                               <div class="checkbox">
                                   <label>
                                   <input type="radio" value="free" v-model="typeOf">
                                   Gratis
                                   </label>
                              </div>
                         </div>
                    </div>
                    <component :is="getComponentForm"></component>
                    <div class="form-group">
                         <div class="col-md-10 col-md-offset-2">
                              <button type="submit" class="btn btn-success">Save <i class="fa fa-check"></i></button>
                              <router-link :to="{name: 'indexVoucher'}" class="btn btn-danger">Cancel <i class="fa fa-times"></i></router-link>
                         </div>
                    </div>
                    
               </form>
          </div>
     </div>
</template>

<script>

     import Discount from './TypeOf/Discount.vue'
     import Free from './TypeOf/Free.vue'
     
     export default {
          name: 'createVoucher',
          components: {
               'app-discount': Discount,
               'app-free': Free
          },
          data(){
               return {
                    typeOf: 'discount',
                    selectComponent: '',
               }
          },
          methods: {
               addVoucher: function(e){
                    let temp = e.target.elements;
                    temp.forEach(item => {
                         console.log(item);
                    });
               }
          },
          computed:{
               getComponentForm: function(){
                    switch(this.typeOf){
                         
                         case 'discount':
                              return "app-discount";
                              break;
                         case 'free':
                              return "app-free";
                              break;
                         default:
                              break;
                    }
                    return;
               },

          },
     }
</script>

<style scoped>

</style>

