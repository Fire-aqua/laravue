<template>
  <v-app>    
    <v-navigation-drawer app>
      <nav-menu/>
    </v-navigation-drawer>
    <v-main>
      <v-container fluid>
        <router-view></router-view>
      </v-container>
    </v-main>
  </v-app>
</template>

<script lang="ts">
import Vue from 'vue';
import NavMenu from './components/NavMenu.vue';
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
