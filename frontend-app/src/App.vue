<template>
  <div id="app">    
    <v-container>
      <div class="row">
        <div class="col-3">
          <nav-menu/>
        </div>
        <div class="col-9">
          <router-view/>
        </div>
      </div>
    </v-container>
  </div>
</template>

<script lang="ts">
import Vue from 'vue';
import NavMenu from '@/components/NavMenu.vue';
import { Component } from 'vue-property-decorator';

@Component(
  {components: {
    NavMenu
  }}
)
export default class App extends Vue {
  text: string | null = '0';
}
</script>

<style lang="scss">
@import "styles/app.scss";
</style>
