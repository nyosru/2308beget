<template>
  <div>
    <tehnologii />
    <div style="background-color: rgba(255,255,0,0.2); border-radius: 10px; text-align:Center;padding: 15px;" >
    Собираю коллекцию кружек со&nbsp;всех&nbsp;стран и&nbsp;городов, пить&nbsp;горячий сладкий кофе&nbsp;с&nbsp;молоком. Можете добавить свою частичку в&nbsp;коллекцию, было бы&nbsp;здорово!
    <a href="https://кружки.сергейсб.рф" target="_blank" >кружки.сергейсб.рф</a>
    </div>
    <br/>
    <br/>
    <br/>
  </div>
</template>

<script>
// import { ref } from "vue";
// import sendTelegramm from "./../use/sendTelegramm.ts";

import Tehnologii from "./../components/Tehnologii.vue";

export default {
  //   props: {
  //     titleFrom: { type: String, default: "x" },
  //   },

  components: {
    Tehnologii,
  },

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

<style lang="scss"></style>
