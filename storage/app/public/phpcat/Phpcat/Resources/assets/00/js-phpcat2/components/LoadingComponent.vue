<template>
  <img
    :src="'/img/loader/' + randomInteger(1, 13) + '.gif'"
    alt="..."
    border="0"
  />1212
</template>

<style lang="scss" scoped>
img {
  width: 6rem;
}
</style>

<script setup>
import DiDrive from './../use/DiDrive.js'
const { randomInteger } = DiDrive()
</script>
