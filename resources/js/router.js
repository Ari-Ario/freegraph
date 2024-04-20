


export const routes = [
    {
        path: "/",
        component: () => import("./pages/Home.vue"),
    },
    
    {
        path: "/login",
        component: () => import("./pages/Auth/Login.vue"),
    },
    {
        path: "/register",
        component: () => import("./pages/Auth/Register.vue"),
    },

    {
        path: "/dashboard",
        component: () => import("./pages/Dashboard.vue"),
        meta: { requiresAuth: true },
    },
];





