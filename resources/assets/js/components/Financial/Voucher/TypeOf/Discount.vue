<template>
<div>
     <div class="form-group">
          <label for="" class="control-label col-md-2">Name Of Voucher</label>
          <div class="col-md-10">
               <input type="text" v-model="discount.name" class="form-control"  required>
          </div>
     </div> 
     <div class="form-group">
          <label for="" class="control-label col-md-2">percentage (%)</label>
          <div class="col-md-10">
               <input type="number" v-model="discount.percentage" class="form-control" required>
          </div>
     </div>
</div>
             
</template>
<script>
     export default{
          name: 'Discount',
          data(){
               return {
                    discount: {
                         name: '',
                         percentage: ''
                    }
               }
          },
          methods: {
              
          },
     }
</script>
<style>

</style>

