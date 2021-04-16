<template>
  <div>
    <h1>Генерация линейного графика со случайными числами</h1>
    <v-btn class="my-3" @click="getRandomInt">Генерировать!</v-btn>
    
    <v-chart class="chart" :option="option" />
  </div>
</template>

<script lang="ts">
import { use } from "echarts/core";
import { CanvasRenderer } from "echarts/renderers";
import { LineChart } from "echarts/charts";
import VChart from "vue-echarts";
import { Component, Vue } from "vue-property-decorator";
import { GridComponent } from "echarts/components";

use([CanvasRenderer, LineChart, GridComponent]);

@Component({ components: { VChart } })
export default class CalcComp3 extends Vue {
  n5 = 0;
  n6 = 0;
  n7 = 0;

  getRandomInt() {
    this.n5 = Math.floor(Math.random() * (50 - 5 + 1)) + 5;
    this.n6 = Math.floor(Math.random() * (50 - 5 + 1)) + 5;
    this.n7 = Math.floor(Math.random() * (50 - 5 + 1)) + 5;
  }

  get option() {
    return {
      yAxis: {
        type: "value",
      },
      xAxis: 
        {
          type: "category"
        },      
      series: [
        {
          data: [this.n5, this.n6, this.n7],
          type: "line",
          smooth: true,
        },
      ],
    };
  }
}
</script>

<style scoped>
.chart {
  height: 400px;
}
</style>