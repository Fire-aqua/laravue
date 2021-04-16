<template>
  <div>
    <h1>Действия с двумя числами</h1>

    <v-text-field
    v-model="n1"
    type = 'number'/>
    <v-text-field
    v-model="n2"
    type = 'number'/>

    <v-radio-group
      v-model="mathAction">
      <v-radio
        label="Сложение"
        value="plus"
      ></v-radio>
      <v-radio
        label="Вычитание"
        value="minus"
      ></v-radio>
      <v-radio
        label="Умножение"
        value="multi"
      ></v-radio>
      <v-radio
        label="Деление"
        value="division"
      ></v-radio>
    </v-radio-group>

    <h2>{{result}}</h2>
  </div>
</template>

<script lang="ts">
import { Vue, Component, Watch } from 'vue-property-decorator'

@Component
export default class CalcComp1 extends Vue {
  n1: number = null
  n2: number = null
  mathAction = ""
  result: number = null

  @Watch("mathAction")
  action() {
    switch(this.mathAction) {
      case 'plus':
        this.result = +this.n1 + +this.n2 
        break;
      case 'minus':
        this.result = this.n1 - this.n2
        break;
      case 'multi':
        this.result = this.n1*this.n2
        break;
      case 'division':
        this.result = this.n1/this.n2
        break;
      default:
        this.result = null
        break
    }
  }
}
</script>