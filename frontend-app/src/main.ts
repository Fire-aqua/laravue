import Vue from 'vue';
import { VuetifyPlugin } from '@/plugins/vuetify';
import { MomentPlugin } from '@/plugins/moment';
import App from './App.vue';
import './registerServiceWorker';
import router from './router';
import store from './store';
import axios from 'axios'

Vue.config.productionTip = false;
Vue.use(MomentPlugin);
axios.defaults.baseURL = 'http://localhost:8000/api';

new Vue({
  router,
  store,
  vuetify: VuetifyPlugin,
  render: (h) => h(App),
}).$mount('#app');
