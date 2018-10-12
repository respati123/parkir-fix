<template>
     <div>
          <div class="form-group">
               <label for="" class="control-label col-md-2">Name Of Voucher</label>
               <div class="col-md-10">
                    <input type="text" v-model="free.name" class="form-control" required>
               </div>
          </div> 
     </div>     
</template>
<script>
     export default{
          name: 'free',
          data(){
               return {
                    free: {
                         name: ''
                    }
               }
          }
     }
</script>
<style>

</style>

