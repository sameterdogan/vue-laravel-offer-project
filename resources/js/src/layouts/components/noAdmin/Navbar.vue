<template>
    <div>
        <nav class="admin-navbar">
            <div class="container">
                <ul class="d-flex align-items-center justify-content-center">
                    <li class="me-3">
                        <router-link :to="{name:'login'}">
                            Giriş Yap
                        </router-link>
                    </li>
                    <li class="me-3">
                        <router-link :to="{name:'register'}">
                            Kayıt Ol
                        </router-link>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</template>

<script>
export default {
    name: 'Navbar',
}
</script>

<style scoped>

</style>
