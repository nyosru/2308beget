<template>
  <div class="row" v-if="1 == 1">
    <div class="col-12 text-center pb-5 menu" style="line-height: 35px">
      
      <router-link :to="{ name: 'index' }">
        <span class="nobr" >Супер&nbsp;предложение!</span>
        </router-link>
        
      <router-link :to="{ name: 'services' }">
        <span class="nobr" >Службы и сервисы!</span>
        </router-link>

      <router-link :to="{ name: 'timeline' }">
        <span class="nobr" >Историческая&nbsp;лента</span>
      </router-link>
      <router-link :to="{ name: 'tests' }">
        <span class="nobr" >Задачки&nbsp;и&nbsp;решения</span>
      </router-link>

      <router-link :to="{ name: 'findTorrent' }">
        <span class="nobr" >Поиск&nbsp;торрентов</span>
      </router-link>      
      
      <!-- <router-link :to="{ name: 'money' }">
        <span class="nobr" >Деньги за простые действия!!</span>
      </router-link> -->

      <!-- <router-link :to="{ name: 'lern' }">Учится, не переучится</router-link> -->
    </div>
  </div>
</template>

<script>
// import { ref } from "vue";
// import sendTelegramm from "./../use/sendTelegramm.ts";

export default {
  //   props: {
  //     titleFrom: { type: String, default: "x" },
  //   },

  data() {
    return {};
  },

  setup(props) {
    // const result = ref("x");
    // const loading = ref(false);

    return {
      //   result,
      //   loading,
    };
  },

  //   //   mounted() {
  //   //     console.log("Component mounted.");
  //   //   },
  //   methods: {
  //     async formSend() {
  //       //   console.log(2222, this.formName, this.formPhone, this.formMsg);
  //       //   console.log(2222, this.formPhone, this.titleFrom);

  //       this.loading = true;

  //       const { sendToTelegramm } = sendTelegramm();
  //       let ww = await sendToTelegramm(
  //         "Где: " +
  //           this.titleFrom +
  //           "<br>" +
  //           "Как зовут: " +
  //           this.formName +
  //           "<br>" +
  //           "Телефон: " +
  //           this.formPhone +
  //           "<br>" +
  //           "Сообщение: " +
  //           this.formMsg
  //       );
  //       //   console.log('ww',ww);
  //       this.result = ww;
  //     },
  //   },
};
</script>

<style lang="scss">
.menu {
  a {
    background-color: #efefef;
    padding: 3px 7px;
    margin-right: 10px;
    border-radius: 3px;
    display: inline-block;
    margin-bottom: 7px;
    &.active {
      background-color: #55efef;
    }
  }
}

.nobr { white-space: pre; margin-right: 5px; }
</style>
