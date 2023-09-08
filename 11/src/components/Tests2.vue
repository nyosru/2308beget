<template>
  <div>
    <div class="container zadachi">
      <tests-form/>

    </div>
  </div>
</template>

<script>
import { onMounted } from "vue";

import dayjs from "dayjs";

import tests from "./tests0.js";

import testsForm from "./TestsForm.vue";

require("dayjs/locale/ru");
dayjs.locale("ru");

export default {
  components: {
    testsForm,
    // highlightjs: hljsVuePlugin.component,
  },
  data() {
    return {};
  },

  setup(props) {
    const { getI, data, loading, errored } = tests();

    onMounted(() => {
      getI();
    });

    return {
      t_data: data,
      loading,
    };
  },

  methods: {
    deleteItem(item_id) {
      const { deleteI } = tests();
      console.log("deleteI(item_id) {", item_id);
      deleteI(item_id);
    },

    showDate(date) {
      if (dayjs(date).isValid()) {
        if (dayjs().year() == dayjs(date).year()) {
          // console.log(777);
          return dayjs(date).format("DD MMMM");
        } else {
          // console.log(888);
          return dayjs(date).format("MMMM YYYY");
        }
      }
    },
  },
};
</script>

<style lang="scss">
.zadachi pre {
  max-height: 350px;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.1);
  padding: 10px;
  font-family: "Courier New", Courier, monospace;
  font-size: 12px;
}
</style>
