<template>
    <div>
        <navbar></navbar>
        <router-view></router-view>
    </div>

</template>

<script>

import navbar from "@/layouts/components/noAdmin/Navbar.vue";
export default {
components:{
 navbar
}
}
</script>

<style scoped>

</style>
