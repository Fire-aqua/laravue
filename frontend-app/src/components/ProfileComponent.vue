<template>
  <div>
    First name: {{ firstName }}
    Last name: {{ lastName }}
    Age: {{ age }}
  </div>
</template>

<script lang="ts">
import { Vue, Component, Prop, Watch } from 'vue-property-decorator'

@Component
export default class ProfileComponent extends Vue{
  @Prop({
    type: String
  })
  name: string 
  
  @Prop({
    type: Number
  })
  age: number | string

  firstName = ""
  lastName = ""

  @Watch("name")
  unConcat() {
    this.firstName = this.name.split(' ')[0]
    this.lastName = this.name.split(' ')[1] ?? ''

    this.$emit('input', this.firstName)
    
    this.$emit('my-event', this.lastName)
  }
}
</script>