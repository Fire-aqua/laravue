<template>
  <div>
    Данный проект создан в качестве тренировочной площадки в освоении фреймворка vue.<br><br>
    Calc - добавление математических и графических компонентов. <br>
    Deads - связь с базой на бэкенде, фабрика данных. <br>
    Story - работа с массивами.<br>
    Structure - добавление и удаление детей к родителям на фронте.
  </div>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';

@Component
export default class Home extends Vue {}
</script>
