<template>
     <div class="box">
          <div class="box-header">
               <h3 class="box-title margin-r-5">Categories Programs</h3>
               <span class="fa fa-gear"></span>
               <router-link :to="{ name: 'createCategory'}" class="btn btn-primary pull-right">Create New Category</router-link>
               <hr class="divider">                    
          </div>
          <div class="box-body">
               <table class="table table-responsive table-bordered">
                    <thead>
                         <tr>
                              <th>Name</th>
                              <th>Description</th>
                              <th width="20%">Execute</th>
                         </tr>
                    </thead>
                    <tbody>
                         <tr v-for="categ in categories" v-bind:key="categ.id">
                              <td>{{ categ.name }}</td>
                              <td>{{ categ.description }}</td>
                              <td>
                                   <router-link :to="{name: 'editCategory', params:{id: categ.id}}" class="btn btn-warning">Edit <i class="fa fa-pencil"></i></router-link>
                                   <button type="button" class="btn btn-danger btn-margin" @click="deleteItem(categ.id)"><i class="fa fa-trash"></i>Delete</button>                                   
                              </td>
                         </tr>
                    </tbody>
               </table>
          </div>
     </div>
</template>
<script>
     export default {
          name: 'category',
          data(){
               return {
                    categories: []
               }
          },
          methods: {
               getDataCategory: function(){
                    axios.get('/api/v1/categories/')
                         .then(response => {
                              console.log(JSON.stringify(response.data.data.data));
                              return this.categories = response.data.data.data;
                         })
               },
                deleteItem(item){
                    const conf = confirm("are you sure?");
                    if(conf){
                    axios.delete('/api/v1/categories/' + item)
                         .then(res => {
                              this.getDataCategory();
                         })
                    } else {
                         alert('cancel')
                    }
               }
          },
          activated(){
               this.getDataCategory();
          }
     }
</script>
<style lang="scss">

</style>

