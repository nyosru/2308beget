<template>
  <nav>
    <router-link to="/">Home</router-link> | <router-link to="/about">About</router-link> |
    <router-link to="/contact">Contact</router-link>

    <menu-component></menu-component>

  </nav>
  <main>
    <router-view />
  </main>
</template>

<script setup>

import MenuComponent from '@/components/MenuComponent.vue'
// import MenuComponent from '@/components/HelloWorld.vue'

</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
