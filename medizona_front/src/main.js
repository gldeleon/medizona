import Vue from "vue";
import App from "./App.vue";
import "./registerServiceWorker";
import router from "./router";
import store from "./store";
import axios from "axios";
import VueSession from "vue-session";
import VueSweetalert2 from "vue-sweetalert2";

import "./assets/global.css";

Vue.use(VueSweetalert2);
Vue.use(VueSession);

Vue.config.productionTip = false;

Vue.prototype.$http = axios;
Vue.prototype.$apiUrl = process.env.VUE_APP_API_URL;

new Vue({
  router,
  store,
  render: (h) => h(App),
}).$mount("#app");
