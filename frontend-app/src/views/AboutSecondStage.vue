<template>
  <div>
    <v-text-field v-model="mytext"/>
    {{mytext}}
  </div>
</template>

<script lang="ts">
import Vue from 'vue';
import { Component, PropSync } from 'vue-property-decorator';

@Component
export default class AboutSecondStage extends Vue {
  @PropSync('mytext', String)
   mytext: string;

  age: number | null = null;

}
</script>