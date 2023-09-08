<template>
  <div>
    <div class="container cont-tl mb-5">

      <div v-for="i in list" :key="i.name" class="row justify-content-center">

        <!-- <div class="my-4 col-12 text-center">
          {{ i }}
        </div> -->

        <div class="col-12 my-4">
          <div class="container-fluid">
            <div class="row">
              <div class="col-4">
                <img :src="i.img" style="width:100%;" />
              </div>
              <div class="col-8">
                <h2>{{ i.name }}</h2>
                <p v-for="p in i.opis" :key="p"><span v-html="p"></span></p>
                <!-- <p>{{ i.opis }}</p> -->
                <p class="alert alert-warning">{{ i.start }}</p>
                <p class="alert alert-success">{{ i.summa }}</p>
                <p class="alert alert-info">{{ i.skidka }}</p>
                Сайт службы: выжидатель.сергейсб.рф
                ТЕлеграм канал службы: выжидатель
                <button class="button success">Добавить первый домен</button>
              </div>
            </div>
            <div class="row" v-if="1==2">
              <div class="col-12">
                {{ i }}
              </div>
            </div>
          </div>
        </div>

        <!-- 
        <div class="col-12">
          <h4>
            получите
            <span class="fs-2 bg-warning px-5 py-2 rounded">{{ i.summa }}</span>
          </h4>
          <br />
          <br />
          <br />
          <h4>Условия</h4>
          <ol>
            <li v-for="p in i.kto" :key="p"><span v-html="p"></span></li>
          </ol>
          <br />
          <br />
          <br />
          <h4>Описание</h4>
          <ol>
            <li v-for="p in i.opis" :key="p"><span v-html="p"></span></li>
          </ol>

          <br />
          <br />
          <br />
          <h4>После получения печенек)</h4>

          {{ i.potom }}
        </div> 
      -->

      </div>
    </div>
  </div>
</template>

<script setup>
const list = [
  {
    img: '/phpcat7/img/binokli4.jpg',

    name: 'Выжидатель доменов',
    start: 'Первые 3 домена бесплатно!',
    summa: '1 домен - 500р / 5 лет',
    skidka: 'для 11-го и последующих доменов, скидка 50%',

    // kto: [
    //   'Живёте в России',
    //   'больше 20 лет',
    //   'раньше никогда не было карточки от Альфа Банка',
    // ],

    opis: [
      'Сервис по ожиданию освобождения доменов',
      'Вы хотите зарегистрировать домен который возможно скоро освободиться ?',
      'Добавляйте домен',
      // 'Вы попали в нужный сервис, оставляйте заявку на этот домен и как он освободится для регистрации, вам в тележку будут приходить оповещения.',
      // 'Оставляете домен который ждёте чтобы освободился',
      'Сервис его проверяет каждый день, и когда домен становится открытым для регистраци вам приходит оповещение в телеграмм',
    ],

    // potom: 'Можете закрыть карту (в лк) и вопрос закрыт',
  },
]
</script>

<style lang="scss"></style>
