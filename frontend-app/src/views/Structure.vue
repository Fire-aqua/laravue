<template>
  <div > 
    <v-row
    class="mx-auto my-3">
        <v-dialog
          v-model="materialDialog">
          <template v-slot:activator="{ on, attrs }">
            <v-btn
            color="primary"
            dark
            v-bind="attrs"
            v-on="on"
            >Add material
            </v-btn>
          </template>
          <v-card>
            <v-card-title>Add material here</v-card-title>
            <v-card-text>
              <v-combobox
              v-model="newMaterialTopic"
              :items="allTopics"              
              ></v-combobox>
              <v-textarea
              v-model="newMaterialContent"></v-textarea>
            </v-card-text>
            <v-card-actions>
              <v-spacer />
              <v-btn
              @click="addMaterial"
              >Add</v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
    </v-row>
    <v-row>
      <v-col>
        <v-card
          class="mx-auto my-3"
          v-for="topic in uniqTopics" 
          :key="topic.topic"
          @click="pickMaterials(topic.topic)"
          >
          <v-card-text>
          {{topic.topic}}
          </v-card-text>
        </v-card>  
      </v-col>
      <v-col
      md="8">
        <v-card
          class="mx-auto my-3"
          v-for="(content, index) in chosenMaterials" 
          :key="index"
          >
          <v-card-text>
          {{content.content}}
          </v-card-text>
          <v-icon
          @click="deleteMaterial(content.content)"
          >mdi-close</v-icon>
        </v-card>  
      </v-col>
    </v-row>
  </div>
</template>

<script lang="ts">
import {Component, Vue, Watch} from 'vue-property-decorator'
import _ from 'lodash'
 
@Component
export default class Structure extends Vue {
  materialDialog = false  
  newMaterialTopic = ""
  newMaterialContent = ""

  materials = [
    {topic: "topic1", content: "content1"},
    {topic: "topic2", content: "content2"},
    {topic: "topic2", content: "content3"},
    {topic: "topic3", content: "content4"},
  ]

  chosenMaterials = []

  get allTopics() {
    return this.materials.map((material) => {
      return material.topic
    })
  }
  
  @Watch("materials")
  get uniqTopics() {
    return _.uniqBy(this.materials, (material)=>{
      return material.topic
    })
  }

  @Watch("materials")
  pickMaterials(chosenTopic) {
    this.chosenMaterials = _.filter(this.materials, ['topic', chosenTopic])
  }

  addMaterial() {
    this.materials.push({topic: this.newMaterialTopic, content: this.newMaterialContent})
    this.materialDialog = false
  }

  deleteMaterial(content) {
    _.remove(this.materials, (material) => {return material.content === content})
  }
}
</script>