<template>
     <div class="box">
          <div class="box-header">
          <span><i class="fa fa-gear"></i></span>
          <h3 class="box-title margin-r-5">Configuration Parking</h3>
          </div>
          <div class="box-body">
          <div class="box">
               <div class="row">
                    <form @submit.prevent="Settings">
                         <div class="col-md-6" style="padding: 10px 50px;">
                              <div class="form-group">
                                   <div class="form-check">
                                        <input class="form-check-input" type="radio" v-model="setRadio" id="exampleRadios1" value="flat" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                        Flat
                                        </label>
                                   </div>
                              </div>
                              
                              <div class="form-group">
                                   <div class="form-check">
                                        <input class="form-check-input" type="radio" v-model="setRadio" id="exampleRadios2" value="next">
                                        <label class="form-check-label" for="exampleRadios2">
                                        next Hours
                                        </label>
                                   </div>    
                              </div>
                              <inputnexthour v-if="isRadio" v-bind:names = names></inputnexthour>
                              <div class="form-group">
                                   <div class="form-check">
                                        <input class="form-check-input" type="checkbox" v-model="setCheck" value="payonetime" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                             Tarif Berlaku satu kali
                                        </label>
                                   </div>
                              </div>
                              <div class="form-group">
                                   <div class="input-group">
                                        <span class="input-group-addon">
                                        <input type="checkbox" aria-label="...">
                                        Maksimal
                                        </span>
                                        <input type="text" class="form-control" v-model="setMaksimal" aria-label="...">
                                   </div><!-- /input-group -->
                              </div>
                              <div class="form-group">
                                   <div class="form-check">
                                        <button type="submit">Save <i class="fa fa-check"></i></button>
                                   </div>
                              </div>
                         </div>
                    </form>
               </div>
          </div>
          
          </div>
     </div>
</template>

<script>

     import inputNextHour from '../parts/InputNextHour.vue'

     export default {
          name: 'GeneralSettings',
          data(){
               return {
                    setRadio: '',
                    setCheck: '',
                    names: [
                         {name: 'Mobil', id:1, harga: 5000},
                         {name: 'Motor', id:2, harga: 3000},
                         {name: 'Truk', id:3, harga: 3000},
                         {name: 'Mobil Box', id:4, harga: 3000},
                    ],
                    setMaksimal: ''
               }
          },
          components: {
               'inputnexthour': inputNextHour
          },
          methods: {
               Settings: function(){

               }
          },
          computed: {
                isRadio : function(){
                return this.setRadio === "next"
            }
          }
     }
</script>

<style scoped>

</style>

