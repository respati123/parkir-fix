<template>
     <div class="form-group">
          <label class="control-label col-sm-2">Name Sub Menu</label>
          <div class="col-sm-10">
               <input type="text" class="form-control" v-model="inputSubMenu.name">
               <button type="button" @click="saveSubMenu">Save</button>
               <button type="button" v-on:click.self="cancelInputSub">Cancel</button>
          </div>    
          <pre>{{this.dataSubs}}</pre>
     </div>
</template>

<script>
     import Store from '../../../store/index'
     // const date = new Date();
     const nameUser = Store.state.user.userData.name;
     import {EventBus} from '../../../event-bus/event-bus'
     export default ({
          name:'partInput',
          props: ['dataSubs'],
          data(){
               return {
                    inputSubMenu: {
                         id: '',
                         name: '',
                         parent_id: '',
                         created_at: '',
                         created_by: '',
                         modifier_at: '',
                         modifier_by: '',
                         database: '',                         
                    },
                    date: new Date(),
                    userAccountName: ''
               }
          },
          mounted() {
               this.userAccountName = this.$store.state.user.userData.name;
          },
          methods: {
               saveSubMenu: function(){
                    console.log(this.inputSubMenu.length);
                    if(this.dataSubs.length === 0 && this.inputSubMenu.length === undefined){
                         this.inputSubMenu.id = 0;
                    } else {
                         const index = this.dataSubs[this.dataSubs.length - 1];
                         const id = index.id;
                         this.inputSubMenu.id = id + 1;
                    }
                    // console.log("tidak kosong");
                    this.inputSubMenu.parent_id = this.$route.params.id;
                    this.inputSubMenu.created_by = this.$store.state.user.userData.name;
                    this.inputSubMenu.created_at = this.date.toDateString();
                    this.inputSubMenu.modifier_at = this.date.toDateString();
                    this.inputSubMenu.modifier_by = this.$store.state.user.userData.name;
                    this.inputSubMenu.database = false;

                    // console.log(JSON.stringify(this.inputSubMenu));
                    EventBus.$emit('sentSubs', {data: this.inputSubMenu, collapse: false});
                    // this.inputSubMenu.name = '';
               },
               cancelInputSub: function(){

               }
          }
     })
</script>
