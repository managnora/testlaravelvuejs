import { createRouter, createWebHistory } from "vue-router";
import requireAuth from "@/router/middleware/requireAuth";
import { useAuthStore } from "@/stores";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: "/",
            redirect: "/auth/login",
        },
        {
            path: "/home",
            meta: {
                title: "Home",
                middleware: [requireAuth],
            },
            component: () => import("@/layouts/HomeLayout.vue"),
            children: [
                {
                    path: "/home/dashboard",
                    name: "dashboardHome",
                    meta: {
                        title: "Home",
                        middleware: [requireAuth],
                    },
                    component: () => import("@/views/home/Home.vue"),
                },
            ],
        },
        {
            path: "/auth",
            name: "Auth",
            component: () => import("@/layouts/AuthLayout.vue"),
            children: [
                {
                    path: "/auth/login",
                    name: "Login",
                    meta: {
                        title: "Authentification",
                    },
                    component: () => import("@/views/auth/Login.vue"),
                },
            ],
        },
        {
            path: "/403",
            name: "UnAuthorized",
            meta: {
                title: "Accès refusé",
            },
            component: () => import("@/views/errors/Error403.vue"),
        },
        {
            path: "/404",
            name: "Notfound",
            meta: {
                title: "Page non trouvée",
            },
            component: () => import("@/views/errors/Error404.vue"),
        },
        {
            path: "/:pathMatch(.*)*",
            redirect: "/404",
        },
    ],
});

router.beforeEach(async (to, from, next) => {
    const hasPublicAccess =
        !to.meta.middleware || to.meta.middleware.length === 0;

    if (hasPublicAccess) {
        return next();
    }

    const authStore = useAuthStore();
    const currentUser = authStore.user;
    if (currentUser) {
        return next();
    }
    return next({
        name: "Login",
    });
});

/* Default title tag */
const defaultDocumentTitle = "EZWAY Test";

/* Set document title from route meta */
router.afterEach((to) => {
    document.title = to.meta?.title
        ? `${to.meta.title} — ${defaultDocumentTitle}`
        : defaultDocumentTitle;
});

export default router;
