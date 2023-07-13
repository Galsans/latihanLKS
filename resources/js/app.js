import { createApp } from "vue";
import App from "./components/App.vue";
import { createRouter, createWebHistory } from "vue-router";

import "bootstrap";
// import "bootstrap-vue/dist/bootstrap-vue.css";
// import "bootstrap/dist/css/bootstrap.css";

// import component
// FOLDER GRADE
import welcome from "./components/HelloWorld.vue";
import grade from "./components/grade/grade.vue";
import gradeIndex from "./components/grade/gradeIndex.vue";
import gradeAdd from "./components/grade/gradeAdd.vue";

// FOLDER MURID
import murid from "./components/murid/murid.vue";
import muridIndex from "./components/murid/muridIndex.vue";
import muridAdd from "./components/murid/muridAdd.vue";
const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: "/", component: welcome },

        { path: "/grades", component: gradeIndex },
        { path: "/grades/create", component: gradeAdd },
        { path: "/grades/:id", component: grade },
        { path: "/grades/:id/edit", component: gradeAdd },

        // FOLDER MURIDS
        { path: "/murids", component: muridIndex },
        { path: "/murids/create", component: muridAdd },
        { path: "/murids/:id", component: murid },
        { path: "/murids/:id/edit", component: muridAdd },
    ],
});

const app = createApp(App);
app.use(router);
app.mount("#app");
