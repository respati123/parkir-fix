<template>
    <div class="box">
        <div class="box-header">
            <span class="fa fa-gear"></span>
            <h3 class="box-title margin-r-5">Classes Programs</h3>
            <router-link :to="{ name: 'createClasses'}" class="btn btn-primary pull-right">Create New Classes</router-link>
            <hr class="divider">
        </div>
        <div class="box-body">
            <table class="table table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Execute</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="cl in classes" v-bind:key="cl.id">
                        <td>
                            {{ cl.name}}
                        </td>
                        <td width="70%">
                            {{ cl.description }}
                        </td>
                        <td>
                            <div class="coloum-button-list">

                                <router-link class="btn btn-warning btn-margin" :to="{ name : 'editClasses', params: { id : cl.id}}">Edit <i class="fa fa-pencil"></i></router-link>
                                <button type="button" class="btn btn-danger btn-margin" @click="deleteItem(cl.id)"><i class="fa fa-trash"></i>Delete</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'indexClasses',
        data(){
            return {
                classes: []
            }
        },
        methods: {
            getDataIndex: function(){
                axios.get('/api/v1/classes')
                    .then(response => {
                        this.classes = response.data.data.data;
                    });
            },
            deleteItem(item){
                const conf = confirm("are you sure?");
                if(conf){
                   axios.delete('/api/v1/classes/' + item)
                        .then(res => {
                            this.getDataIndex();
                        })
                } else {
                    alert('cancel')
                }
            }
        },
        mounted(){
            this.getDataIndex();
        }
    }
</script>

<style scoped>
    .coloum-button-list {
        display: inline-flex;
        padding: 30px 0;
    }
    .btn-margin {
        margin-right: 10px;
    }

</style>