<template>
	<div class="box">
		<div class="box-body">
			<form @submit.prevent="addUser" class="form-horizontal">
				<div class="form-group">
					<label class="control-label col-md-2">Name of user</label>
					<div class="col-md-10">
						<input type="text" placeholder="name of user" v-model="users.name" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-2">Username</label>
					<div class="col-md-10">
						<input type="text" placeholder="Username" v-model="users.username" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-2">Email</label>
					<div class="col-md-10">
						<input type="email" placeholder="email" v-model="users.email" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-2">Password</label>
					<div class="col-md-10">
						<input type="password" placeholder="password" v-model="users.password" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-2">Roles</label>
					<div class="col-md-10" v-if="isEmpty" style="display: flex;">
						<p style="margin: 0 4px;">tidak ada Roles</p> <router-link :to="{ name: 'createRoles' }">create Roles</router-link>
					</div>
					<div class="col-md-10" v-else>
						<select multiple="true" v-on:dblclick="onChange" v-model="users.roles" class="form-control">
							<option v-for="role in roles" :value="role.value">{{ role.name }}</option>
						</select>
					</div>
				</div>
				<div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2" style="display: flex;">
                        <div class="badge-theme" v-for="(roleselect, index) in rolesSelected" v-bind:key="index">
                            <p>{{ roleselect.name }}</p>
                            <button type="button" class="close"  v-on:click="removeListRoles(index, roleselect.name, roleselect.value)" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                	<div class="col-md-10 col-md-offset-2">
                		<button type="submit" class="btn btn-success">Save <i class="fa fa-check"></i></button>
                		<router-link :to="{name: 'indexUser'}" class="btn btn-danger">Cancel <i class="fa fa-times"></i></router-link>	
                	</div>
                </div>
			</form>
		</div>
	</div>
</template>

<script>
	export default{
		name: 'createUser',
		data(){
			return {
				users: {
					name: '',
					username: '',
					email: '',
					password: '',
					roles:[]
				},
				roles:[],
				rolesSelected: []
			}
		},
		methods: {
			getRoles: function(){
				axios.get('/api/v1/roles/')
					.then(response => {
						// console.log(response.data.data);
						let dataTemp = response.data.data;
						dataTemp.forEach(item => {
							this.roles.push({name : item.name, value: item.id});
						})
					}, (error => {

					}));
			},
			addUser: function(){
			axios.post('/api/v1/users/', {user:this.users, role:this.rolesSelected})
					.then(response => {
						this.$router.push({
							name: 'indexUser'
						});
					}, (error => {
						console.log(error.message);
					}));
			},
			onChange: function(e){
				let items = {};
				items['name'] = e.target.text;
				items['value'] = e.target.value;

				if(items['name'] === undefined && items['value'] === ''){
					return;
				}				
				this.rolesSelected.push(items);
				this.roles.splice(e.target.index, 1);
			},
			removeListRoles: function(index, name, value){

				this.roles.unshift({name: name, value: value});
				this.rolesSelected.splice(index, 1);

			},
		},
		beforeMount(){
			this.getRoles();
		},
		computed: {
			isEmpty: function(){
				return this.roles.length === 0;
			}
		}

	}
</script>

<style scoped>
	
</style>