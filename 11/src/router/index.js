import {
    createRouter,
    createWebHashHistory,
    RouteRecordRaw,
} from "vue-router";

import Home from "@/view/Home.vue";
import Vuex from "@/view/Vuex.vue";
// import Vuex from "./../views/Vuex.vue";
const routes = [
    {
        path: "/",
        name: "Home",
        component: Home,
    },
    {
        path: "/vuex",
        name: "Vuex",
        component: Vuex,
    },
    // {
    //     path: "/axios",
    //     name: "Axios",
    //     component: () => import("@/view/Axios.vue"), // lazy-load
    // },
], router = createRouter({
    history: createWebHashHistory(),
    routes,
});

export default router;
