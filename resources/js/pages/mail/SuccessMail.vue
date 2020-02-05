<template>
    <div class="row">
        <div class="col-md-18" v-if="success">
            <h2>{{title}}</h2>
            <label>Email:{{email}}</label>
            <p>{{bodycontent}}</p>
        </div>
         
 
    </div>
</template>
<style scoped>
	
</style>
<script>
    export default {
        data(){
            return{
                success:this.$route.params.success,
                title:'Send mail successfuly',
                username:this.$route.params.username,
                code:this.$route.params.code
            }
        }
    } 
</script>
