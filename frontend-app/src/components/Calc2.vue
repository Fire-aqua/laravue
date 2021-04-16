<template>
  <div>
    <h1>График на основе трех чисел</h1>

    <v-row>
      <v-text-field
      v-model="n3"
      type = 'number'/>
      <v-text-field
      v-model="n4"
      type = 'number'/>
      <v-text-field
      v-model="n5"
      type = 'number'/>
    </v-row>

     <v-chart class="chart" :option="option" />
  </div>
</template>

<script lang="ts">
import { use } from "echarts/core";
import { CanvasRenderer } from "echarts/renderers";
import { PieChart } from "echarts/charts";
import {
  TitleComponent,
  TooltipComponent,
  LegendComponent
} from "echarts/components";
import VChart from "vue-echarts";
import { Component, Vue } from 'vue-property-decorator';

use([
  CanvasRenderer,
  PieChart,
  TitleComponent,
  TooltipComponent,
  LegendComponent
]);

@Component({
  components: { VChart }
})
export default class Calc2 extends Vue {
  n3 = 0
  n4 = 0
  n5 = 0

  get option() {
    return {
      title: {
        text: "Three number pie",
        left: "center"
      },
      tooltip: {
        trigger: "item",
        formatter: "{a} <br/>{b} : {c} ({d}%)"
      },
      series: [
        {
          name: "Three number pie",
          type: "pie",
          radius: "55%",
          center: ["50%", "60%"],
          data: [
            { value: this.n3, name: "First number" },
            { value: this.n4, name: "Second number" },
            { value: this.n5, name: "Third number" }
          ],
          emphasis: {
            itemStyle: {
              shadowBlur: 10,
              shadowOffsetX: 0,
              shadowColor: "rgba(0, 0, 0, 0.5)"
            }
          }
        }
      ]
    }
  }  
}
</script>

<style scoped>
.chart {
  height: 400px;
}
</style>