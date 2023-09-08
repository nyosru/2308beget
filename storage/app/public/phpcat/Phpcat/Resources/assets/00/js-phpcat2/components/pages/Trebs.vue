<template>
  <div class="container" style="min-height: 60vh;">
  
    <div class="row" v-if="loading">
      <div class="col-12 text-center">
        <br />
        <br />
        <br />
        <h3 style="color: gray;">.. формирую ..</h3>
        <loading-component></loading-component>
      </div>
    </div>

    <div v-else class="row">
      <div class="col-12">
        <form id="form_order2" action="" method="post">

          <div class="container">
       
            <div
              class="list_head hidden-xs pt-5"
              style="border-bottom: 1px solid gray;"
            >
              <div class="row">
                <div class="col-8 col-sm-6 col-md-4 xcol-lg-3 col-lg-4 name">
                  <b>Наименование</b>
                </div>

                <div
                  class="d-none d-md-block col-md-2 xcol-lg-1 col-lg-2 text-center"
                >
                  <b>Кол-во</b>
                </div>
                <div
                  class="d-none d-md-block col-md-2 xcol-lg-1 col-lg-2 text-center"
                >
                  <b>Контакты</b>
                </div>
              </div>
            </div>

            <trebs-row
              xv-for="el in pageData"
              v-for="el in pageData"
              :key="el.id"
              :el="el"
            >
            </trebs-row>
          </div>
        </form>

        <br />
        <br />

      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, watchEffect } from 'vue'
// import axios from "axios";

import LoadingComponent from './../LoadingComponent.vue'

import TrebsRow from './TrebsRow.vue'
import Trebs from './../../use/Trebs.js'

const searchString = ref('')

const { good, loading, getData, pageData, loadError } = Trebs()
getData()
const listData = ref([])
</script>

<style lang="scss" scope>
pre {
  max-height: 300px;
  overflow: auto;
}

.list_head,
.table thead {
  position: -webkit-sticky;
  position: -moz-sticky;
  position: -ms-sticky;
  position: -o-sticky;
  position: sticky;
  // top: 40px;
  top: 0px;
  background-color: rgba(5, 255, 255, 0.8);
  z-index: 200;
}

.table thead th {
  background-color: rgba(255, 255, 255, 0.8);
}

.item {
  margin-top: 3px;
  margin-bottom: 3px;
}

.item:nth-child(2n) {
  background-color: rgba(0, 0, 0, 0.05);
}
</style>
