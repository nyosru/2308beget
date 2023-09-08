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
                  v-model="f_company"
                  :data="{
                    required: true,
                    // vmodel: 'f_name', value: 333
                  }"
                >
                  Название компании
                </Form.Input>

                <Form.Input
                  v-model="f_rukovoditel"
                  :data="{
                    required: true,
                    // name: 111, vmodel: 'f_name', value: 333
                  }"
                >
                  Руководитель
                </Form.Input>
                <Form.Input
                  v-model="f_inn"
                  :data="{
                    required: true,
                    // name: 111,
                    // vmodel: 'f_name', value: 333
                  }"
                >
                  ИНН
                </Form.Input>

                <Form.Input
                  v-model="f_kpp"
                  :data="{
                    required: true,
                    // name: 111,
                    // vmodel: 'f_name', value: 333
                  }"
                >
                  КПП
                </Form.Input>

                <Form.Input
                  v-model="f_ogrn"
                  :data="{
                    required: true,
                    // type: 'date',
                    // vmodel: 'f_name', value: 333
                  }"
                >
                  ОГРН
                </Form.Input>

                <Form.Input
                  v-model="f_glavbuh"
                  :data="{
                    // required: true,
                    // type: 'date',
                    // type: 'number',
                    // min: 0,
                    // step: 1,
                    // vmodel: 'f_name', value: 333
                  }"
                >
                  Главный бухгалтер
                </Form.Input>

                <Form.Input
                  v-model="f_kontakt_fio"
                  :data="{
                    required: true,
                    // type: 'date',
                    // type: 'number',
                    // min: 0,
                    // step: 1,
                    // vmodel: 'f_name', value: 333
                  }"
                >
                  ФИО контактного лица
                </Form.Input>

                <Form.Input
                  v-model="f_phone"
                  :data="{
                    required: true,
                    // type: 'date',
                    // type: 'number',
                    // min: 0,
                    // step: 1,
                    // vmodel: 'f_name', value: 333
                  }"
                >
                  Телефон
                </Form.Input>

                <Form.Input
                  v-model="f_socweb"
                  :data="{
                    required: true,
                    // type: 'date',
                    // type: 'number',
                    // min: 0,
                    // step: 1,
                    // vmodel: 'f_name', value: 333
                  }"
                >
                  страница в соц.сети
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

const f_company = ref('') // Название компании
const f_rukovoditel = ref('') // Руководитель
const f_inn = ref('') // ИНН
const f_kpp = ref('') // КПП
const f_ogrn = ref('') // ОГРН
const f_glavbuh = ref('') // Главный бухгалтер
const f_kontakt_fio = ref('') // ФИО контактного лица
const f_phone = ref('') // Телефон
const f_socweb = ref('') // страница в соц.сети
const f_polza = ref('') // Что можете предложить нашему обществу

const sendForm1 = async () => {
  let ar = {
    f_company: f_company.value,
    f_rukovoditel: f_rukovoditel.value,
    f_inn: f_inn.value,
    f_kpp: f_kpp.value,
    f_ogrn: f_ogrn.value,
    f_glavbuh: f_glavbuh.value,
    f_kontakt_fio: f_kontakt_fio.value,
    f_phone: f_phone.value,
    f_socweb: f_socweb.value,
    f_polza: f_polza.value,
  }
  // console.log(777 , ar )
  await sendForm('Форма регистрации юр.лица (большая)', ar)
}

const { loading, sendForm, loadError, loaded, form_now } = FormReg()
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
