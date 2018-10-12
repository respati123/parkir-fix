<template>
	<div>
		<router-view name="parentIndex"></router-view>
	</div>
</template>
<script>
	import Admin from './admin.vue'
    export default {
		name: "App",
		components: {
			admin: Admin
		},
		data() {
            return {

			}
		},
		mounted(){
			console.log(this.$store.state.name);
		}
    }
</script>

<style lang="scss">

</style>