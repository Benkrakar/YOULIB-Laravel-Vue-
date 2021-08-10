
<template>
  <div> 
   <router-view></router-view>
  </div>
</template>
<script>
// const default_layout = "default";

export default {
  name: 'App',
  computed:{
    isLogged(){
      return this.$store.getters.isLogged;
    },
  
  }
}
</script>