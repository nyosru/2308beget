<template>
	<div class="container text-center">
	  <h1>{{ $route.name }} Page Component</h1>
	  <div v-if="loading">... загружаю ...</div>
	  <div v-else>
		<span v-html="pageData"></span>
	  </div>
	</div>
  </template>
  <script setup>
  import Page from './../../use/Page'
  
  import {
	// useRouter,
	useRoute,
  } from 'vue-router'
  // const router = useRouter()
  const route = useRoute()
  
  const { page, pageData, loadError, loading, getData } = Page()
  
  getData(route.name)
  // console.log(222, route.name)
  console.log(22233, route , route.meta.ss , route.params.username )
  </script>
  