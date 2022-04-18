import { createApp, h } from 'vue';
import { createInertiaApp, Link, Head } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';

import ECharts from 'vue-echarts';
import { use } from 'echarts/core';
import { CanvasRenderer } from 'echarts/renderers';
import { PieChart } from 'echarts/charts';
import { TooltipComponent } from 'echarts/components';

import './assets/main.css';
import '../auto-imports.d';

import DefaultLayout from './layouts/DefaultLayout.vue';
import BaseIcon from './components/BaseIcon.vue';
import BaseButton from './components/BaseButton.vue';

use([CanvasRenderer, PieChart, TooltipComponent]);

createInertiaApp({
  resolve: async (name) => {
    const page = (await import(`./pages/${name}.vue`)).default;
    page.layout = page.layout === undefined ? DefaultLayout : page.layout;
    return page;
  },
  setup({ el, app, props, plugin }) {
    createApp({ render: () => h(app, props) })
      .use(plugin)
      // inertia
      .component('InertiaLink', Link)
      .component('InertiaHead', Head)
      // components
      .component('EChart', ECharts)
      .component('BaseIcon', BaseIcon)
      .component('BaseButton', BaseButton)
      .mount(el);
  },
});

InertiaProgress.init();
