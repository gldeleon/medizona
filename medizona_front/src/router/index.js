import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home.vue";
import Nota from "../views/Notas.vue";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },
  {
    path: "/nota",
    name: "Nota",
    component: Nota,
  }
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});

export default router;
