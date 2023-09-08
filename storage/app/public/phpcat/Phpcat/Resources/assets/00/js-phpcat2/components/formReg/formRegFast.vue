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

            <table class="table table-striped" id="ttr">
              <tbody>
                <tr>
                  <td>
                    <label for="fio">
                      Как Вас зовут &nbsp;
                      <b color="red">*</b>
                    </label>
                  </td>
                  <td>
                    <div class="xform-group">
                      <input
                        style="width: 100%;"
                        id="fio"
                        type="text"
                        rel="Как Вас зовут"
                        required=""
                        v-model="bw_fio"
                      />
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="tel">
                      Телефон &nbsp;
                      <b color="red">*</b>
                    </label>
                  </td>
                  <td>
                    <div class="xform-group">
                      <input
                        style="width: 100%;"
                        id="tel"
                        type="text"
                        rel="Телефон"
                        required=""
                        v-model="bw_phone"
                      />
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><label for="soc_set">Страница в соц. сети</label></td>
                  <td>
                    <div class="xform-group">
                      <input
                        style="width: 100%;"
                        id="soc_set"
                        type="text"
                        rel="Страница в соц. сети"
                        v-model="bw_socweb"
                      />
                    </div>
                    <small>Например http://vk.com/id123123123</small>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="polza">
                      Расскажите немного о&nbsp;себе и&nbsp;о&nbsp;том,
                      чем&nbsp;занимаетесь&nbsp;
                      <b color="red">*</b>
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
                </tr>
                <!-- <tr>
                  <td>
                    <b>Введите цифры:<b color="red">*</b></b> 47627
                  </td>
                  <td>
                    <input
                      name="antispam"
                      style="width: 98%; text-align: center"
                      type="text"
                      value=""
                      required=""
                    />
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

const bw_fio = ref('')
const bw_phone = ref('')
const bw_socweb = ref('')
const bw_predlogau = ref('')

const sendForm1 = async () => {
  let ar = {
    fio: bw_fio.value,
    phone: bw_phone.value,
    socweb: bw_socweb.value,
    predlogau: bw_predlogau.value,
  }
  // console.log(777 , ar )
  await sendForm('Форма быстрой регистрации', ar)
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
