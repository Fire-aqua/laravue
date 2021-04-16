<template>
  <div>    
    <v-text-field v-model="text"/>
    {{ countChange }}
     <v-form v-model="user">
    <v-container>
      <v-row>
        <v-col
          cols="12"
          md="4"
        >
          <v-text-field
            v-model="firstname"
            :counter="20"
            label="Имя"
          ></v-text-field>
        </v-col>

        <v-col
          cols="12"
          md="4"
        >
          <v-text-field
            v-model="lastname"
            :counter="20"
            label="Фамилия"
          ></v-text-field>
        </v-col>

        <v-col
          cols="12"
          md="4"
        >          
          <v-radio-group
            v-model="sex"
            row
          >
            <v-radio              
              label="М"
              value="man"
            ></v-radio>
            <v-radio
              label="Ж"
              value="women"
            ></v-radio>
          </v-radio-group>
        </v-col>
      </v-row>
    </v-container>
  </v-form>  
  <h1 v-if="sex=='man'">Уважаемый {{fio}}!</h1>
  <h1 v-else-if="sex=='women'">Уважаемая {{fio}}!</h1> 

  <div v-if="completedFirstStage">
    <about-second-stage
    :mytext.sync="firstname"
    />
  </div>
  <div v-else>Заполните данные</div>   
  <v-row justify="center"
    class="my-3">     
    <profile-component
      v-model="parentFistName"
      @input="saveLastName"
      @my-event="saveLastName"
      :age="18"
      :name="fullName"
    />
    <v-text-field
    v-model="fullName"
    />
    </v-row>
    <v-row>
    <h1>{{parentFirstName}}</h1>
    <h3>{{parentLastName}}</h3>
    </v-row> 
  </div>
</template>

<script lang="ts">
import Vue from 'vue';
import { Component, Watch } from 'vue-property-decorator';
import AboutSecondStage from '../views/AboutSecondStage.vue'
import ProfileComponent from '../components/ProfileComponent.vue';

@Component({
  components: {
    AboutSecondStage,
    ProfileComponent,
  }
})
export default class About extends Vue {
  firstname = '';
  lastname = '';
  sex: string | null = null;
  text = '';
  countChange = 0;
  users: any[] = []
  fullName = ""
  parentFirstName = ""
  parentLastName = ""
  
  saveLastName(eventData) {
    this.parentLastName = eventData
  }

  get fio() {
    return `${this.upperLowerFio(this.firstname)} ${this.upperLowerFio(this.lastname)}`;
  }

  upperLowerFio(string: string): string {
    return string.charAt(0).toUpperCase() + string.slice(1).toLowerCase()
  }

  @Watch('text')
  textChanged() {
    this.countChange += 1;
  }

  get completedFirstStage(): boolean {
    return !!this.firstname && !!this.lastname && !!this.sex     
  }    
}

</script>
