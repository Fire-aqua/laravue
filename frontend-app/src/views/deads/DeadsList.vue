<template>
  <div>
    <v-data-table
  :headers="deadsHeader"
  :items="deads"
    />
  </div>
</template>

<script lang="ts">
import Vue from 'vue'
import axios from 'axios'
export default Vue.extend({
  data() {
    return {
      deads: [],
      deadsHeader: [
        {
          text: 'Имя',
          value: 'name'
        },
        {
          text: 'Дата',
          value: 'date_of_death'
        },
        {
          text: 'Возраст',
          value: 'age'
        },
        {
          text: 'Высота',
          value: 'height'
        },
      ]
    }
  },

  mounted() {
    this.getDeadsFromServer()
  },

  methods: {
    getDeadsFromServer() {
      axios.get('/deads').then((response) => {
        this.deads = response.data
      })
    }    
  }
})
</script>