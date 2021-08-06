<template>
    <div >
     <!-- <h2>hello mr {{ user.name }}</h2> -->
     <h2>your phone is {{ user.phone }}</h2>
    </div>
</template>

<script>
 import {mapGetters } from 'vuex';
export default {
    computed:{
        ...mapGetters({
            authenticated:'auth/authenticated',
            user:'auth/user'
        })
    }
}
</script>

<style scoped>

</style>