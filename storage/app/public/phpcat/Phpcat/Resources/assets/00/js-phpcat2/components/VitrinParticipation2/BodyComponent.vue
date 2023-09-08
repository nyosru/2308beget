<template>
  <div class="container-fluid" style="min-height: 60vh;">
    <div class="row" v-if="loading">
      <div class="col-12 text-center">
        <br />
        <br />
        <br />
        <h3 style="color: gray;">.. загружаемся информацией ..</h3>
      </div>
    </div>
    <div v-else class="row">
      <div class="col-12">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 col-md-6">
              <fieldset>
                <legend>Фильтрация</legend>
                <label>
                  <span>
                    Счет
                  </span>
                  <select v-model="filterFormSchet">
                    <option value="">все</option>
                    <option v-for="i in filterSchet" :key="i">{{ i }}</option>
                  </select>
                </label>
                <br />
                <!-- <br />              filterSchet {{ filterSchet }} -->
                <label>
                  <span>
                    Организация
                  </span>
                  <select v-model="filterFormOrg">
                    <option value="">все</option>
                    <option v-for="i in filterOrg" :key="i">{{ i }}</option>
                  </select>
                </label>
                <!-- <br />
              FilterFormOrg: {{ filterFormOrg }} -->
                <!-- <br /> -->

                <!-- <br />              filterOrg: {{ filterOrg }} -->
                <br />
                <label>
                  <span>
                    Затея
                  </span>
                  <select v-model="filterFormZateya">
                    <option value="">все</option>
                    <option v-for="i in filterZateya" :key="i">{{ i }}</option>
                  </select>
                </label>
                <!-- <br />              filterZateya: {{ filterZateya }} -->
                <!-- <br />
              filterFormZateya: {{ filterFormZateya }} -->
                <br />
                <label>
                  <span>
                    Движ
                  </span>
                  <select v-model="filterFormDvig">
                    <option value="">все</option>
                    <option v-for="i in filterDvig" :key="i">{{ i }}</option>
                  </select>
                </label>
                <br />
                <!-- filterFormDvig: {{ filterFormDvig }} -->
                <!-- <br />              filterDvig: {{ filterDvig }} -->
              </fieldset>
            </div>

            <div class="col-6">
              <!-- form_schet:
              {{ form_schet }}
              <br />
              form_org:
              {{ form_org }}
              <br />
              form_zateya
              {{ form_zateya }}
              <br />
              form_dvig
              {{ form_dvig }} -->
            </div>

            <div class="col-12">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <td>
                      счет
                      <br />
                      организация
                      <br />
                      затея
                    </td>

                    <!-- <td class="d-none d-md-table-cell"> -->
                    <!-- <td class="d-table-cell d-md-none"> -->

                    <td>
                      <span class="d-none d-md-table-cell">
                        дебет начало
                      </span>
                      <span class="d-table-cell d-md-none">
                        дебет
                        <br />
                        кредит
                        <br />
                        (начало)
                      </span>
                    </td>
                    <td>
                      <span class="d-none d-md-table-cell">
                        кредит начало
                      </span>
                      <span class="d-table-cell d-md-none">
                        дебет
                        <br />
                        кредит
                        <br />
                        (оборот)
                      </span>
                    </td>
                    <td>
                      <span class="d-none d-md-table-cell">
                        дебит оборот
                      </span>
                      <span class="d-table-cell d-md-none">
                        дебет
                        <br />
                        кредит
                        <br />
                        (конец)
                      </span>
                    </td>

                    <td class="d-none d-md-table-cell">
                      кредит оборот
                    </td>
                    <td class="d-none d-md-table-cell">
                      дебит конец
                    </td>
                    <td class="d-none d-md-table-cell">
                      кредит конец
                    </td>
                  </tr>
                </thead>
                <tbody>
                  <row v-for="el in pageData2" :key="el.id" :el="el"></row>
                  <!-- <tr>
                    <td>
                      счет
                      <br />
                      организация
                      <br />
                      затея
                    </td>
                    <td>дебет нач</td>
                    <td>кредит нач</td>
                    <td>дебит об</td>
                    <td>кредит об</td>
                    <td>дебит кон</td>
                    <td>кредит кон</td>
                  </tr>
                  <tr>
                    <td>
                      счет
                      <br />
                      организация
                      <br />
                      затея
                    </td>
                    <td>дебет нач</td>
                    <td>кредит нач</td>
                    <td>дебит об</td>
                    <td>кредит об</td>
                    <td>дебит кон</td>
                    <td>кредит кон</td>
                  </tr>
                  <tr>
                    <td>
                      счет
                      <br />
                      организация
                      <br />
                      затея
                    </td>
                    <td>дебет нач</td>
                    <td>кредит нач</td>
                    <td>дебит об</td>
                    <td>кредит об</td>
                    <td>дебит кон</td>
                    <td>кредит кон</td>
                  </tr>
                  <tr>
                    <td>
                      счет
                      <br />
                      организация
                      <br />
                      затея
                    </td>
                    <td>дебет нач</td>
                    <td>кредит нач</td>
                    <td>дебит об</td>
                    <td>кредит об</td>
                    <td>дебит кон</td>
                    <td>кредит кон</td>
                  </tr> -->
                </tbody>
                <tfoot>
                  <tr>
                    <td>
                      Итого:
                    </td>
                    <td class="d-none d-md-table-cell">
                      {{ new Intl.NumberFormat('ru').format(summ1) }}
                    </td>
                    <td class="d-table-cell d-md-none">
                      {{ new Intl.NumberFormat('ru').format(summ1) }}
                      <br />
                      {{ new Intl.NumberFormat('ru').format(summ2) }}
                    </td>
                    <td class="d-none d-md-table-cell">
                      {{ new Intl.NumberFormat('ru').format(summ2) }}
                    </td>
                    <td class="d-table-cell d-md-none">
                      {{ new Intl.NumberFormat('ru').format(summ3) }}
                      <br />
                      {{ new Intl.NumberFormat('ru').format(summ4) }}
                    </td>
                    <td class="d-none d-md-table-cell">
                      {{ new Intl.NumberFormat('ru').format(summ3) }}
                    </td>
                    <td class="d-table-cell d-md-none">
                      {{ new Intl.NumberFormat('ru').format(summ5) }}
                      <br />
                      {{ new Intl.NumberFormat('ru').format(summ6) }}
                    </td>
                    <td class="d-none d-md-table-cell">
                      {{ new Intl.NumberFormat('ru').format(summ4) }}
                    </td>
                    <td class="d-none d-md-table-cell">
                      {{ new Intl.NumberFormat('ru').format(summ5) }}
                    </td>
                    <td class="d-none d-md-table-cell">
                      {{ new Intl.NumberFormat('ru').format(summ6) }}
                    </td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<!-- <script> -->
<script setup>
import { ref, watchEffect } from 'vue'

import Row from './RowComponent.vue'
// import Row from "./RowHeadComponent.vue";
import Datar from './Datar.js'

import User from './../../use/User.ts'
const { userId } = User()

// // alert(userId.value)
if (userId.value == 0) {
  window.location.href = '/'
}

// export default {
//   components: {
//     Row,
//   },
//   setup(props) {

const filterFirm = ref('')
const pageData2 = ref([])

// const form_schet = ref('')
// const form_org = ref('')
// const form_zateya = ref('')
// const form_dvig = ref('')

const filterFormSchet = ref('')
const filterFormOrg = ref('')
const filterFormZateya = ref('')
const filterFormDvig = ref('')

const {
  good,
  loading,
  getData,
  headUnique,
  pageData,
  loadError,
  filterData,

  filterSchet,
  filterOrg,
  filterZateya,
  filterDvig,
} = Datar()

getData()

// watchEffect(() => {
//   if (filterFirm.value.length > 0) {
//     pageData2.value = pageData.value.filter(function (n) {
//       return n.firma == filterFirm.value
//     })
//   }
// })

const summ1 = ref(0)
const summ2 = ref(0)
const summ3 = ref(0)
const summ4 = ref(0)
const summ5 = ref(0)
const summ6 = ref(0)

// function isBigEnough(el) {
//   return el.nomerSceta >= 10
// }

const filteringDataArray = (shet = '', org = '', zateya = '', dvig = '') => {
  // console.log(shet, org, zateya, dvig)

  // если нет массива данных то возвращаем пустой массив
  if (!pageData.value.length) return []

  let ret = pageData.value.filter(
    (el) =>
      (shet.length ? el.nomerSceta == shet : true) &&
      (org.length ? el.firma == org : true) &&
      (zateya.length ? el.zateya == zateya : true) &&
      (dvig.length ? el.dviz == dvig : true),
  )

  if (ret.length) {
    filterSchet.value = [
      ...new Set(Array.from(ret, ({ nomerSceta }) => nomerSceta)),
    ].sort()
    filterOrg.value = [...new Set(Array.from(ret, ({ firma }) => firma))].sort()
    filterZateya.value = [
      ...new Set(Array.from(ret, ({ zateya }) => zateya)),
    ].sort()
    filterDvig.value = [...new Set(Array.from(ret, ({ dviz }) => dviz))].sort()

    summ1.value = ret
      .map((item) => item['debetNaNacloPerioda'])
      .reduce((prev, curr) => prev + Number(curr), 0)
      .toFixed(2)
    summ2.value = ret
      .map((item) => item['kreditNaNacloPerioda'])
      .reduce((prev, curr) => prev + Number(curr), 0)
      .toFixed(2)
    summ3.value = ret
      .map((item) => item['oborotDebet'])
      .reduce((prev, curr) => prev + Number(curr), 0)
      .toFixed(2)
    summ4.value = ret
      .map((item) => item['oborotKredit'])
      .reduce((prev, curr) => prev + Number(curr), 0)
      .toFixed(2)
    summ5.value = ret
      .map((item) => item['debetNaKonecPerioda'])
      .reduce((prev, curr) => prev + Number(curr), 0)
      .toFixed(2)
    summ6.value = ret
      .map((item) => item['kreditNaKonecPerioda'])
      .reduce((prev, curr) => prev + Number(curr), 0)
      .toFixed(2)
  }
  // return pageData.value
  return ret
}

watchEffect(() => {
  // if (
  //   form_schet.value.length ||
  //   form_org.value.length ||
  //   form_zateya.value.length ||
  //   form_dvig.value.length
  // ) {
  // let ar = sss(form_schet.value, form_org.value, form_zateya.value, form_dvig.value)
  // pageData2.value = ar

  pageData2.value = filteringDataArray(
    filterFormSchet.value,
    filterFormOrg.value,
    filterFormZateya.value,
    filterFormDvig.value,
  )
  // pageData2.value = ar

  // summ1.value = pageData2.value.map(item => item['debet-na-naclo-perioda'] ).reduce((prev, curr) => prev + curr, 0);
  // summ2.value = ar.map(item => item['kredit-na-naclo-perioda'] ).reduce((prev, curr) => prev + curr, 0);
  // summ3.value = ar.map(item => item['oborot-debet'] ).reduce((prev, curr) => prev + curr, 0);
  // summ4.value = ar.map(item => item['oborot-kredit'] ).reduce((prev, curr) => prev + curr, 0);
  // summ5.value = ar.map(item => item['debet-na-konec-perioda'] ).reduce((prev, curr) => prev + curr, 0);
  // summ6.value = ar.map(item => item['kredit-na-konec-perioda'] ).reduce((prev, curr) => prev + curr, 0);
  // console.log(sumall);

  // }
})

//     return {
//       pageData2,
//       filterFirm,
//       headUnique,
//       loading,
//       pageData,
//       good,
//     };
//   },
// };
</script>

<style lang="scss">
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
  top: 40px;
  background-color: rgba(200, 200, 255, 0.8);
  z-index: 200;
}

.item {
  margin-top: 3px;
  margin-bottom: 3px;
}

.item:nth-child(2n) {
  background-color: rgba(0, 0, 0, 0.1);
}

.btn-list {
  text-align: center;
  margin-top: 3vh;
  margin-bottom: 3vh;
}
.btn-list button {
  margin-right: 1vw;
}
.div-top-3 {
  position: sticky;
  top: 60px;
  z-index: 200;
}

tfoot {
  position: -webkit-sticky;
  position: -moz-sticky;
  position: -ms-sticky;
  position: -o-sticky;
  position: sticky;
  bottom: 0;
  background-color: rgba(200, 255, 200, 0.9);
  z-index: 200;
}
tfoot td {
  //   border-top: 2px solid gray;
  text-align: right;
}

select {
  width: 150px;
}
label > span {
  width: 150px;
  display: inline-block;
}
fieldset {
  border: 1px solid green;
  text-align: center;
  box-shadow: 0 0 10px gray;
  margin: 15px;
  border-radius: 10px;
  // padding: 5px 15px;
  padding-bottom: 15px;
}

thead td {
  border-right: 1px solid gray;
  text-align: right;
  font-weight: bold;
}
thead td:first-child {
  text-align: left;
}
</style>
