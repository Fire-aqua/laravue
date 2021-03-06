<template>
  <div>    
    <v-card
    class="pa-12"
    color="indigo darken-2"
    flat
  >
    <v-card
      elevation="12"
      width="256"
    >
      <v-navigation-drawer
        floating
        permanent
      >
        <v-list
          dense
          rounded
        >
          <v-list-item
            v-for="item in items"
            :key="item.title"
            link
          >
            <v-list-item-content>
              <router-link :to="item.link">
                <v-list-item-title>
                  {{ item.title }}
                </v-list-item-title>
              </router-link>
            </v-list-item-content>
          </v-list-item>
        </v-list>
      </v-navigation-drawer>
    </v-card>
  </v-card>
  </div>
</template>

<script lang="ts">
import Vue from 'vue'
export default Vue.extend({
  data () {
      return {
        items: [
          { title: 'Home', link: '/' },
          { title: 'About', link: '/about' },
          { title: 'Deads', link: '/deads' },
        ],
      }
    },
})
</script>