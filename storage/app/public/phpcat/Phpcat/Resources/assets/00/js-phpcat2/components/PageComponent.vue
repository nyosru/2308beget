<template>
  <div class="container text-center p-20">
    <!-- <transition :duration="1000" appear> -->
    <!-- <h1>{{ $route.name }} Page Component</h1> -->
    <!-- <h1 class="head">{{ $route.meta.name }}</h1> -->
  <!-- </transition> -->
      <transition name="fade">
    <div v-if="loadError">
      ... упс, что то поло не так ...
    </div>

    <div v-else-if="loading">
      <loadings></loadings>
      <!-- ... загружаю ... -->
    </div>
    <div v-else>
      <span v-html="pageData"></span>
    </div>
  </transition>
  </div>
</template>

<style scope>
.p-20 {
  padding: 20px;
}
/* .head{
  padding: 10px 20px;
  background-color: rgba(150,150,150,0.2);
  text-align: left;
} */

.fade-enter-active, .fade-leave-active {
  transition: opacity 5.5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active до версии 2.1.8 */ {
  opacity: 0;
  height: 1px;
}

</style>

<script setup>
import { ref, watchEffect, watch, onMounted } from 'vue'

import Page from './../use/Page'
import Loadings from './LoadingComponent'

import {
  // useRouter,
  useRoute,
} from 'vue-router'
// const router = useRouter()
const route = useRoute()

// const { page , pageData, loadError, loading, getData } = Page()
const { pageData, loadError, loading, getData } = Page()

// при загрузке
onMounted(() => {
  getData(route.name)
})

// при переходе
watch(route, async (new2, old) => {
  if (new2.meta.type == 'page') {
    getData(new2.name)
  }
})
</script>
