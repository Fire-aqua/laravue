<template>
  <div class="about">
    <h1>This is an about page {{ text }}</h1>
    <v-data-table
  :headers="headers"
  :items="deads"
  :items-per-page="2"
  class="elevation-1"
  />

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
  </div>
</template>

<script lang="ts">
import Vue from 'vue';
import { Component, Watch } from 'vue-property-decorator';
import AboutSecondStage from '../views/AboutSecondStage.vue'
import axios from 'axios'

@Component({
  components: {
    AboutSecondStage
  }
})
export default class About extends Vue {
  firstname = '';
  lastname = '';
  sex: string | null = null;
  text = 'w';
  countChange = 0;
  users: any[] = []

  get fio() {
    return `${this.upperLowerFio(this.firstname)} ${this.upperLowerFio(this.lastname)}`;
  }

  upperLowerFio(string: string): string {
    return string.charAt(0).toUpperCase() + string.slice(1).toLowerCase()
  }

  get newValue() {
    return `${this.text}d11111`;
  }

  mounted() {
    this.getUsers();
  }

  @Watch('text')
  textChanged() {
    this.countChange += 1;
  }

  get completedFirstStage(): boolean {
    return !!this.firstname && !!this.lastname && !!this.sex     
  }

  async getUsers() {
    this.users = await axios.get('http://localhost:8000/api/users')
    .then((response) => response.data)
    response = {
      data: []
    }
  }

  data () {
    return {
      headers: [
        {
          text: 'deads',
          align: 'start',
          sotrable: true,
          value: 'name',
        },
        { text: 'Name', value: 'name'},
        { text: 'Date of death', value: 'date'},
        { text: 'Age', value: 'years'}

      ],
      deads: [
        {
          name: 'George Mallory',
          date: '18.06.1924',
          years: 37,
        },
        {
          name: 'Andrew Irvine',
          date: '08.06.1924',
          years: 22,
        },
        {
          name: 'Maurice Wilson',
          date: '01.06.1934',
          years: 36,
        },
        {
          name: 'Hannelore Schmatz',
          date: '02.10.1979',
          years: 39,
        },
        {
          name: 'Peter Boardman',
          date: '17.05.1982',
          years: 31,
        },
      ],
        }
      }
    }

</script>
