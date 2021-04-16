<template>
  <div class="mx-3">
    <calc1/>
    <calc2/>
    <calc3/>
  </div>
</template>

<script lang="ts">
import { Vue, Component } from 'vue-property-decorator'
import Calc1 from '../components/Calc1.vue'
import Calc2 from '../components/Calc2.vue'
import Calc3 from '../components/Calc3.vue'

@Component({
  components: {Calc1, Calc2, Calc3}
})

export default class Calc extends Vue {}
</script>