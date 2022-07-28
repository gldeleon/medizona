import Vue from "vue";
import App from "./App.vue";
import "./registerServiceWorker";
import router from "./router";
import store from "./store";
import VueTailwind from "vue-tailwind";
import Axios from "axios";
import {
  TInput,
  TTextarea,
  // TSelect,
  // TRadio,
  // TCheckbox,
  // TButton,
  // TInputGroup,
  // TCard,
  // TAlert,
  // TModal,
  // TDropdown,
  // TRichSelect,
  // TPagination,
  // TTag,
  // TRadioGroup,
  // TCheckboxGroup,
  // TTable,
  // TDatepicker,
  // TToggle,
  // TDialog,
} from 'vue-tailwind/dist/components';

const settings = {
  // Use the following syntax
  // {component-name}: {
  //   component: {importedComponentObject},
  //   props: {
  //     {propToOverride}: {newDefaultValue}
  //     {propToOverride2}: {newDefaultValue2}
  //   }
  // }
  't-input': {
    component: TInput,
    props: {
      classes: 'border-2 block w-full rounded text-gray-800'
      // ...More settings
    }
  },
  't-textarea': {
    component: TTextarea,
    props: {
      classes: 'border-2 block w-full rounded text-gray-800'
      // ...More settings
    }
  },
  // ...Rest of the components
}

Vue.config.productionTip = false;
Vue.use(VueTailwind, settings);

Vue.prototype.$http = Axios;

new Vue({
  router,
  store,
  render: (h) => h(App),
}).$mount("#app");
