<template>
  <div class="container-fluid mt-5">
    <!-- loading: {{ loading }}
        <br /> -->
    <!-- loadError: {{ loadError }}        <br /> -->
    <!-- bw_fio: {{ bw_fio }}        <br /> -->
    <!-- bw_phone: {{ bw_phone }}        <br /> -->
    <!-- bw_socweb: {{ bw_socweb }}        <br /> -->
    <!-- bw_predlogau: {{ bw_predlogau }}        <br /> -->

    <transition name="fade">
      <div class="row" v-if="loaded">
        <div class="col-12">
          <h2>
            Отправлено! Спасибо!
          </h2>
        </div>
      </div>

      <form
        v-else
        name="bw"
        action=""
        method="post"
        enctype="multipart/form-data"
        class="submit send_bw5 ajax"
        div_load="ajaxform_res2"
        div_res="ajaxform_res1"
        res_ok="ajaxform_res1"
        res_error="ajaxform_res12"
        show_block_loaded="ajaxform_res2"
        @submit.prevent="sendForm1"
      >
        <div class="row">
          <div class="col-12">
            <!-- <input type="hidden" v-model="form_now" /> -->
            <!-- f_name: {{ f_name }}
            <br />
            f_soname: {{ f_soname }}
            <br />
            f_family: {{ f_family }}
            <br /> -->

            <table class="table table-striped" id="ttr">
              <tbody>
                <Form.Input
                  v-model="f_name"
                  :data="{
                    required: true,
                    // vmodel: 'f_name', value: 333
                  }"
                >
                  Имя
                </Form.Input>
                <Form.Input
                  v-model="f_soname"
                  :data="{
                    // required: true,
                    // name: 111, vmodel: 'f_name', value: 333
                  }"
                >
                  Отчество
                </Form.Input>
                <Form.Input
                  v-model="f_family"
                  :data="{
                    required: true,
                    // name: 111,
                    // vmodel: 'f_name', value: 333
                  }"
                >
                  Фамилия
                </Form.Input>

                <Form.Input
                  v-model="f_graj"
                  :data="{
                    required: true,
                    // name: 111,
                    // vmodel: 'f_name', value: 333
                  }"
                >
                  Гражданство
                </Form.Input>

                <Form.Input
                  v-model="f_dr"
                  :data="{
                    required: true,
                    type: 'date',
                    // vmodel: 'f_name', value: 333
                  }"
                >
                  День рождения
                </Form.Input>

                <Form.Input
                  v-model="f_inn"
                  :data="{
                    // required: true,
                    // type: 'date',
                    type: 'number',
                    min: 0,
                    step: 1,
                    // vmodel: 'f_name', value: 333
                  }"
                >
                  ИНН
                </Form.Input>

                <Form.Input
                  v-model="f_orgnip"
                  :data="{
                    // required: true,
                    // type: 'date',
                    type: 'number',
                    min: 0,
                    step: 1,
                    // vmodel: 'f_name', value: 333
                  }"
                >
                  ОГРНИП
                </Form.Input>

                <Form.Input
                  v-model="f_socweb"
                  :data="{
                    // required: true,
                    // type: 'date',
                    // type: 'number',
                    // min: 0,
                    // step: 1,
                    // vmodel: 'f_name', value: 333
                  }"
                >
                  Ваш страница в соц. сети
                </Form.Input>

                <Form.Textarea
                  v-model="f_polza"
                  :data="{
                    // required: true,
                    // type: 'date',
                    // type: 'number',
                    // min: 0,
                    // step: 1,
                    // vmodel: 'f_name', value: 333
                  }"
                >
                  Что можете предложить нашему обществу
                </Form.Textarea>

                <Form.HeadRow>Паспортные данные</Form.HeadRow>

                <Form.Input
                  v-model="f_pasp_seriya"
                  :data="{
                    required: true,
                    // type: 'date',
                    // vmodel: 'f_name', value: 333
                  }"
                >
                  серия номер
                </Form.Input>

                <Form.Input
                  v-model="f_pasp_data"
                  :data="{
                    required: true,
                    type: 'date',
                    // vmodel: 'f_name', value: 333
                  }"
                >
                  Дата выдачи
                </Form.Input>

                <Form.Input
                  v-model="f_pasp_kem_vudan"
                  :data="{
                    required: true,
                    // type: 'date',
                    // vmodel: 'f_name', value: 333
                  }"
                >
                  Кем выдан
                </Form.Input>

                <Form.Input
                  v-model="f_pasp_reg"
                  :data="{
                    // required: true,
                    // type: 'date',
                    // vmodel: 'f_name', value: 333
                  }"
                >
                  Адрес регистрации
                </Form.Input>

                <!-- // Дата выдачи паспорта
        //                         v-model="pasport_date_vudachi"
        // Дата выдачи паспорта
        //                         v-model="pasport_vudan"
        // Адрес регистрации
        //                         v-model="pasport_registraciya"
        // ИНН
        //                         v-model="inn"
        // ОГРН ИП
        //                         v-model="orgnip"
        // Ваш страница в соц. сети
        //                                 v-model="socweb"
        // Телефон
        //                 v-model="phone" /></div> </td> </tr>
        // Что можете предложить нашему обществу <b color="red">*</b>
        //                         v-model="bw_predlogau" -->

                <!-- <tr><td><label for="name">Имя <b color="red">*</b></label></td>
                  <td><div class="xform-group"><input
                        id="name" type="text" style="width: 100%;" rel="" required=""
                        v-model="name"                      />                    </div>
                                        </td>
                </tr>

                <tr><td><label for="fam">Фамилия <b color="red">*</b></label></td> <td><div class="xform-group"><input
                        id="fam" type="text" style="width: 100%;" rel="" required=""
                        v-model="family"                      />                    </div> </td> </tr>

                <tr><td><label for="gr">Гражданство <b color="red">*</b></label></td> <td><div class="xform-group"><input
                        id="gr" type="text" style="width: 100%;" rel="" required=""
                        v-model="gragdanstvo"                      />                    </div> </td> </tr>

                <tr><td><label for="dr">День рождения <b color="red">*</b></label></td> <td><div class="xform-group"><input
                        id="dr" type="date" style="width: 100%;" rel="" required=""
                        v-model="den_rogd"                      />                    </div> </td> </tr>

                <tr><td><label for="pasport_seria">Серия паспорта <b color="red">*</b></label></td> <td><div class="xform-group"><input
                        id="pasport_seria" type="text" style="width: 100%;" rel="" required=""
                        v-model="pasport_seria"                      />                    </div> </td> </tr>

                <tr><td><label for="pasport_date_vudachi">Дата выдачи паспорта <b color="red">*</b></label></td> <td><div class="xform-group"><input
                        id="pasport_date_vudachi" type="date" style="width: 100%;" rel="" required=""
                        v-model="pasport_date_vudachi"                      />                    </div> </td> </tr>

                <tr><td><label for="pasport_vudan">Дата выдачи паспорта <b color="red">*</b></label></td> <td><div class="xform-group"><input
                        id="pasport_vudan" type="date" style="width: 100%;" rel="" required=""
                        v-model="pasport_vudan"                      />                    </div> </td> </tr>

                <tr><td><label for="pasport_reg">Адрес регистрации <b color="red">*</b></label></td> <td><div class="xform-group"><input
                        id="pasport_reg" type="text" style="width: 100%;" rel="" required=""
                        v-model="pasport_registraciya"                      />                    </div> </td> </tr>

                <tr><td><label for="inn">ИНН <b color="red">*</b></label></td> <td><div class="xform-group"><input
                        id="inn" type="number" step="1" min="0" style="width: 100%;" rel="" required=""
                        v-model="inn"                      />                    </div> </td> </tr>

                <tr><td><label for="orgnip">ОГРН ИП <b color="red">*</b></label></td> <td><div class="xform-group"><input
                        id="orgnip" type="number" step="1" min="0" style="width: 100%;" rel="" required=""
                        v-model="orgnip"                      />                    
                        <small>только для индивидуальных предпринимателей</small>
                      </div> </td> </tr>

                <tr><td><label for="socweb">Ваш страница в соц. сети </label></td> <td><div class="xform-group"><input
                        id="socweb" type="text" style="width: 100%;" rel="" xrequired=""
                        v-model="socweb"                      />                    </div> </td> </tr>

                <tr><td><label for="phone">Телефон </label></td> <td><div class="xform-group"><input
                        id="phone" type="number" step="1" style="width: 100%;" rel="" xrequired=""
                        v-model="phone" /></div> </td> </tr>

                        <tr>
                  <td>
                    <label for="polza">
                      Что можете предложить нашему обществу <b color="red">*</b>
                    </label>
                  </td>
                  <td>
                    <div class="xform-group">
                      <textarea
                        style="width: 100%;"
                        id="polza"
                        rel="Что можете предложить нашему обществу"
                        required=""
                        v-model="bw_predlogau"
                      ></textarea>
                    </div>
                  </td>
                </tr> -->

                <tr>
                  <td colspan="2" align="center">
                    <div
                      id="ajaxform_res12"
                      class="bg-warning"
                      style="padding: 5px 10px; display: none;"
                    ></div>
                    <p>
                      <input
                        name="suba"
                        style="width: 70%; text-align: center;"
                        type="submit"
                        value="Отправить"
                      />
                    </p>
                    <div id="ajaxform_res2" style="display: none;">
                      <img src="/img/load.gif" alt="" border="0" />
                    </div>
                    <p></p>
                  </td>
                </tr>
              </tbody>
            </table>
            <input name="action" type="hidden" value="send_ajax" />
            <input name="run_modul" type="hidden" value="051.enter" />
            <input name="id" type="hidden" value="47627" />
            <input
              name="s"
              type="hidden"
              value="cd781bb9311f252b24f57078744abc96"
            />
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <p>
              <small>
                Поля помеченные звёздочкой (
                <b color="red">*</b>
                ) обязательны для заполнения.
              </small>
            </p>
          </div>
        </div>
      </form>
    </transition>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import FormReg from './FormReg.js'

import * as Form from './../form/components'

const f_name = ref('')
// Имя

const f_soname = ref('')
// Отчество

const f_family = ref('')
// Фамилия

const f_graj = ref('')
// Гражданство

const f_dr = ref('')
// День рождения

const f_inn = ref('')
// ИНН

const f_orgnip = ref('')
// ОГРНИП
const f_socweb = ref('')
// Ваш страница в соц. сети

const f_polza = ref('')
// Что можете предложить нашему обществу

const f_pasp_seriya = ref('')
// серия номер

const f_pasp_data = ref('')
// Дата выдачи

const f_pasp_kem_vudan = ref('')
// Кем выдан

const f_pasp_reg = ref('')
// адрес реги

const sendForm1 = async () => {
  let ar = {
    //     fio: bw_fio.value,

    f_name: f_name.value,
    // Имя

    f_soname: f_soname.value,
    // Отчество

    f_family: f_family.value,
    // Фамилия

    f_graj: f_graj.value,
    // Гражданство

    f_dr: f_dr.value,
    // День рождения

    f_inn: f_inn.value,
    // ИНН

    f_orgnip: f_orgnip.value,
    // ОГРНИП
    f_socweb: f_socweb.value,
    // Ваш страница в соц. сети

    f_polza: f_polza.value,
    // Что можете предложить нашему обществу

    f_pasp_seriya: f_pasp_seriya.value,
    // серия номер

    f_pasp_data: f_pasp_data.value,
    // Дата выдачи

    f_pasp_kem_vudan: f_pasp_kem_vudan.value,
    // Кем выдан

    f_pasp_reg: f_pasp_reg.value,
    // адрес реги
  }
  // console.log(777 , ar )
  await sendForm('Форма регистрации физ.лица (большая)', ar)
}

// const fio = ref('')
// const phone = ref('')
// const socweb = ref('')
// const predlogau = ref('')
const { loading, sendForm, loadError, loaded, form_now } = FormReg()
// const datar = ref([])
</script>

<style>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>
