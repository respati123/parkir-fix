<template>
<div>
     <div class="form-group">
          <div class="box">
               <div class="box-body">
                    <div class="form-horizontal">
                         <div class="row">
                              <div class="form-group" v-for="cobas in dataInput" v-bind:key="cobas.id">
                                   <label for="" class="col-md-2 control-label">{{ cobas.name }}({{ cobas.harga }})</label>
                                   <div class="col-md-10">
                                        <select class="form-control" v-model="select"  v-on:change="change($event.target.value, cobas.id)">
                                             <option value="" disabled>--select--</option>
                                             <option value="5000">5000</option>
                                             <option value="4000">4000</option>
                                             <option value="3000">3000</option>
                                             <option value="2000">2000</option>
                                        </select>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <pre>{{ this.input }}</pre>
               </div>
          </div>
     </div>
</div>

     
</template>

<script>
     export default {
          props: {
               names: {
                    type: Array,
                    required: true
               }
          },
          data(){
               return {
                    dataInput: this.names,
                    input: [],
                    select: ''
               }
          },
          methods: {
               change: function(name, id){
                    if(name === ''){
                         this.input.forEach((item,index) => {
                             if(item.id === id){
                                  this.input.splice(index, 1);
                                  return;
                             }
                         })
                         console.log('kosong')
                    } else {
                         this.input.push({name: name, id:id});
                    }
               }
          },
          computed:{
               
          }
     }
</script>

<style scoped>

</style>
