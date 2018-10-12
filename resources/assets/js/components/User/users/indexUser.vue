<template>
	<div class="box">
		<div class="box-header">
			<span class="fa fa-gear"></span>
			<h3 class="box-title margin-5-r">Users</h3>
			<router-link :to="{ name: 'createUser'}" class="btn btn-primary pull-right">Create new Users</router-link>	
			<hr class="divider">
		</div>
		<div class="box-body">
			<table class="table table-responsive table-bordered">
				<thead>
					<tr>
						<th>Has Roles</th>
						<th>created_by</th>
						<th>created_at</th>
						<th>modifier_by</th>
						<th>modifier_at</th>
						<th>Execute</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="data in dataUser">
						<td>{{ data.name }}</td>
						<td>
							<p v-for="role in data.role" class="badge badge-default">
								{{ role.name }}
							</p>
						</td>
						<td>
							{{data.created_by}}
						</td>
						<td>{{ data.created_at}}</td>
						<td>{{ data.modifier_by}}</td>
						<td>{{ data.modifier_at}}</td>
						<td>
							<router-link :to="{ name: 'editUser', params: {id: data.id}}" class="btn btn-warning">Edit <i class="fa fa-pencil"></i></router-link>
							<button type="button" class="btn btn-danger">Delete <i class="fa fa-trash"></i></button>
						</td>
					</tr>
				</tbody>
			</table>
			<pre>{{ this.dataUser }}</pre>
		</div>
	</div>
</template>
<script>	
	export default {
		name: 'indexUser',
		data: function(){
			return {
				dataUser: []
			}
		},
		methods: {
		    getData: function(){
		        axios.get('/api/v1/users/')
					.then(response => {
					    let tempData = response.data[0].data;
					    tempData.forEach(item => {
					        console.log(item);
					        this.dataUser.push(item);
						});
					}, (error => {
					    console.log(error.message)
					}));
			}
		},
		beforeMount(){
		    this.getData();
		}
	}
</script>
<style scoped>
	
</style>