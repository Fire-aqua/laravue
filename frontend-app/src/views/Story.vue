<template>
  <div>
    <template v-if="phraseNum == 0">
      <v-btn class="my-3"
      @click="nextPhrase"
      >Начать историю!</v-btn>
    </template>

    <template v-else-if="phraseNum > 0 && phraseNum < 11">
    <v-btn class="my-3"
      @click="nextPhrase"
      >Следующая реплика</v-btn>
      <h1>{{firstStory.phrase}}</h1>
    </template>

    <template v-else-if="phraseNum == 11">    
    <v-row>
      <v-btn class="my-3"
      @click="choiceLove"
      >Я люблю программирование!</v-btn>
      <v-btn class="my-3"
      @click="choiceHate"
      >Я ненавижу программирование!</v-btn>
    </v-row>
    </template>

    <template v-else-if="phraseNum == 12">
      <h2 v-if="choice == 1">
        И я тоже люблю!
      </h2>
      <h2 v-else-if="choice == 0">
        Может, ты просто не умеешь его готовить?
      </h2>
      <h2 v-else>
        Поздравляю, сломано!
      </h2>
      <h1>Конец истории!</h1>
    </template>

    <template v-else>
      Поздравляю, сломано!
    </template>
  </div>
</template>

<script lang="ts">
import { Component, Vue, Watch } from "vue-property-decorator";
import axios from "axios"

type Phrase = {
  id: number;
  phrase: string;
  phrase_number: number;
  created_at: string;
  updated_at: string;
}

@Component
export default class App extends Vue {
  story: Phrase[] = [] 
  phraseNum = 0
  firstStory: Phrase | null = null
  choice: number | null = null

  mounted() {
    this.getStoryFromServer()
  }

  getStoryFromServer() {
    axios.get("/story").then((response) => {
      this.story = response.data
    })
  }    

  nextPhrase() {
    this.phraseNum +=1
  }

  @Watch("phraseNum")
  showFirstStory() {
    this.firstStory = this.story.find(story => story.phrase_number === this.phraseNum)
  }

  choiceLove() {
    this.choice = 1
    this.phraseNum +=1
  }
  
  choiceHate() {
    this.choice = 0
    this.phraseNum +=1
  }
}
</script>