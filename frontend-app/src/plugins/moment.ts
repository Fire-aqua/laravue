import { PluginObject } from 'vue';
import moment from 'moment';

moment.locale('ru');

export const MomentPlugin: PluginObject<any> = {
  install(Vue) {
    Vue.prototype.$moment = moment;
  },
};
