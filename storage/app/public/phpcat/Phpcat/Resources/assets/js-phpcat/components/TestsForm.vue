<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        форма
        <form @submit.prevent="submitForm">
          <br />
          <br />
          название
          <br />
          <input type="text" v-model="head" class="form-control" required />

          <br />
          <br />
          дата
          <br />
          <input type="date" v-model="date" class="form-control" required />

          <br />
          <br />
          текст
          <br />
          <textarea v-model="text" class="form-control"></textarea>

          <br />
          <br />
          code
          <br />
          <textarea v-model="code" class="form-control"></textarea>

          <br />
          <br />
          ссылка 1
          <br />
          <input type="text" v-model="link1" class="form-control" />

          <br />
          <br />
          ссылка 2
          <br />
          <input type="text" v-model="link2" class="form-control" />

          <br />
          <br />
          ссылка 3
          <br />
          <input type="text" v-model="link3" class="form-control" />

          <!-- <br />
          картинка
          <br />
          <input type="file" @change="fileAdd" class="form-control" />
          -->

          <!-- ссылка
          <br />
          <input type="text" v-model="link" class="form-control" />
          <br /> -->
          <br />
          <br />
          <button type="submit" class="btn btn-info">добавить</button>

          <br />
        </form>
        <br />
        result: {{ result }}
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'

import tests from './tests0.js'

const head = ref('')
const date = ref('')
const text = ref('')
const code = ref('')
const link1 = ref('')
const link2 = ref('')
const link3 = ref('')

const result = ref(false)

const fileAdd = (e) => {
  this.attachment = e.target.files[0]
  console.log(this.attachment)
}

const submitForm = () => {
  let result = false
  //   console.log(2222, this.head, this.date, this.text , this.attachment , this.link );

  const { addI, getI } = tests()

  result = addI(
    head.value,
    date.value,
    text.value,
    code.value,
    link1.value,
    link2.value,
    link3.value,
  )
  // head.value = ''
  // date.value = ''
  // text.value = ''
  // code.value = ''
  // link1.value = ''
  // link2.value = ''
  // link3.value = ''
  // //   this.attachment = {};
  getI()
}
</script>

<style lang="scss"></style>
