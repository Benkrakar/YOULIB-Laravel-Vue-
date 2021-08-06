<template>
    <div class="dashboard">
        <Sidebar/>
        <div class="content">
            <router-view/>
        </div>
    </div>
</template>

<script>
import Sidebar from '../../components/dashboard/Sidebar.vue'
export default {

    name: 'home',

    components: {
        Sidebar
    }
}
</script>

<style>

</style>