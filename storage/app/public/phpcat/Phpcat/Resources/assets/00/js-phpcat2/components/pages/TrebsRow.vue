<template>
  <!-- <div class="row">
    <div class="col-xs-12">el {{ el }}</div>
  </div> -->
  <div class="row item pt-1 pb-1">
    <div
      class="xcol-xs-12 xcol-sm-4 xcol-md-3 xcol-lg-3 name_item col-8 col-sm-6 col-md-4 xcol-lg-3 col-lg-4 name"
      xclick="show1 = !show1"
    >
      {{ el.naimenovanie ?? '' }}
      {{ el.dobavka ?? '' }}
    </div>
    <div class="d-none d-md-block col-md-2 xcol-lg-1 col-lg-2 text-center">
      {{ el.kolicestvo ?? '-' }}
      <span class="ed_iz">{{ el.edizm ?? '' }}</span>
    </div>
    <div class="d-none d-md-block col-md-2 xcol-lg-1 col-lg-4 text-left">
      {{ el.mol }} <br/>
      <a v-if="el.sait != ''"  :href="el.sait" target="_blank" >{{ el.sait }}</a>
    </div>

  </div>
</template>

<script setup>
// import { ref } from 'vue';
import { computed } from 'vue'
// import axios from "axios";
// import Vitrin from './../../use/Vitrin.ts'

const props = defineProps({
  el: Object,
})

// export default {
//   props: {
//     el: { type: Object },
//     // good: { type: Object },
//   },

// data() {
//   return {
const show1 = false
//   }
// },

//   setup(props) {
//     const { good } = Vitrin()

//     good.value[props.el.id] = 0

//     // const pageData = ref('');

//     // // loading.value = false;
//     // axios
//     // .get(
//     //     "/api47/getVitrin"
//     //     )
//     //     .then((response) => {
//     //     pageData.value = response.data.data;
//     //     })
//     //     .catch((error) => {
//     //     console.log(error);
//     //     // loadError.value = true;
//     //     })
//     //     ;

//     // let formatter = new Intl.NumberFormat([locales[, options]]);
//     // formatter.format(number); // форматирование

//     // const ru = new Intl.NumberFormat("ru").format(amount);

//     const showPrice1 = computed(() =>
//       new Intl.NumberFormat('ru').format(Math.ceil(props.el.cena1)),
//     )
//     const showPrice2 = computed(() =>
//       new Intl.NumberFormat('ru').format(Math.ceil(props.el.cena2)),
//     )
//     const showPrice3 = computed(() =>
//       new Intl.NumberFormat('ru').format(Math.ceil(props.el.cena3)),
//     )

//     return {
//       good,
//       showPrice1,
//       showPrice2,
//       showPrice3,
//     }
//   },
// }
</script>

<style lang="scss">
pre {
  max-height: 300px;
  overflow: auto;
}

.kolvo {
  text-align: center;
  width: 40px;
}

.nobr {
  white-space: pre;
}

.price {
  text-align: right;
}

.btn--plus,
.btn--minus {
  display: inline-block;
  border-radius: 3px;
  border: none;
  padding: 1px 5px 3px 5px;
}

.btn--plus {
  background-color: rgba(0, 255, 0, 0.2);
}
.btn--minus {
  background-color: rgba(255, 0, 0, 0.2);
}
</style>
