<script>
import axios from "axios";
import ProjectCard from './ProjectCard.vue';

export default {
  name: "App",
  components: {
    ProjectCard,
  },
  data() {
    return {
      apiFirstUrl: "http://127.0.0.1:8000/api/projects",
      lastPage: null,
      projects: [],
      linkPages: [],
      currentPage: null
    };
  },
  methods: {
    getApi(url) {
      axios.get(url).then((result) => {
        this.projects = result.data.projects.data;
        this.linkPages = result.data.projects.links;
        this.lastPage = result.data.projects.last_page;
      });
    },
    getPage(numberPage) {
      axios.get(this.linkPages[numberPage].url).then((result) => {
        this.projects = result.data.projects.data;
        this.linkPages = result.data.projects.links;
        this.currentPage = result.data.projects.current_page;
      });
    }
  },
  mounted() {
    this.getApi(this.apiFirstUrl);
  },
};
</script>

<template>
  <div class="container">
    <div class="main-wrap">
      <h1 class="title">LISTA PROGETTI</h1>
      <div class="cards-container">
          <ProjectCard v-for="project in projects" :key="project.id" :project="project" />
      </div>
      <div class="pagination">
        <button @click="getPage(1)"><i class="fa-solid fa-backward-step"></i></button>
        <template v-for="page in linkPages" :key="page.label">
          <button :class="{clicked: page.active}" v-if="!isNaN(page.label)" @click="getPage(parseInt(page.label))" >{{ page.label }}</button>
        </template>
        <button @click="getPage(lastPage)"><i class="fa-solid fa-forward-step"></i></button>
      </div>
    </div>
  </div>
</template>

<style lang="scss">


</style>

