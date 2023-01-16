import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    scrollBehavior() {
        return {x: 0, y: 0}
    },
    routes: [
        {
            path: '/',
            name: 'offers',
            component: () => import('@/views/offer/ListOffer.vue'),
            meta: {
                pageTitle: 'Teklifler',
                breadcrumb: [
                    {
                        text: 'Teklifler',
                        active: true,
                    },
                ]
            },
        },
        {
            path: '/create-offer',
            name: 'create-offer',
            component: () => import('@/views/offer/CreateOffer.vue'),
            meta: {
                pageTitle: 'Teklif Oluştur',
                breadcrumb: [
                    {
                        text: 'Teklif Oluştur',
                        active: true,
                    },
                ],
                layout: "full"
            },
        },
        {
            path: '/',
            name: 'projects',
            component: () => import('@/views/project/ListProject.vue'),
            meta: {
                pageTitle: 'Projeler',
                breadcrumb: [
                    {
                        text: 'Projeler',
                        active: true,
                    },
                ]
            },
        },
        {
            path: '/account',
            name: 'profile',
            component: () => import('@/views/account/Profile.vue'),
            meta: {
                pageTitle: 'Profilim',
                breadcrumb: [
                    {
                        text: 'Profilim',
                        active: true,
                    },
                ]
            },
        },

        {
            path: '/login',
            name: 'login',
            component: () => import('@/views/auth/Login.vue'),
            meta: {
                layout: 'full',
            },
        },
        {
            path: '/register',
            name: 'register',
            component: () => import('@/views/auth/Register.vue'),
            meta: {
                layout: 'full',
            },
        },
        {
            path: '/error-404',
            name: 'error-404',
            component: () => import('@/views/error/Error404.vue'),
            meta: {
                layout: 'full',
            },
        },
        {
            path: '*',
            redirect: 'error-404',
        },
    ],
})

// ? For splash screen
// Remove afterEach hook if you are not using splash screen
router.afterEach(() => {
    // Remove initial loading
    const appLoading = document.getElementById('loading-bg')
    if (appLoading) {
        appLoading.style.display = 'none'
    }
})

export default router
