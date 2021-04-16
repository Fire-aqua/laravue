import Vue from 'vue';
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
import '@mdi/font/css/materialdesignicons.css';
import ru from 'vuetify/src/locale/ru';

Vue.use(Vuetify);

export const VuetifyPlugin = new Vuetify({
  icons: {
    iconfont: 'mdi',
  },
  lang: {
    locales: { ru },
    current: 'ru',
  },
});
