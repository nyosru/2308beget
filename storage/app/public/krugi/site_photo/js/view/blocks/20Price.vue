<template>
  <div class="container my-24 px-6 mx-auto">
    <!-- Section: Design Block -->
    <section class="mb-32 text-gray-800">
      <!-- Jumbotron -->
      <div class="container mx-auto xl:px-32 text-center lg:text-left">
        <div class="grid lg:grid-cols-2 flex items-center">
          <div class="mb-12 lg:mb-0">
            <div
              class="block rounded-lg shadow-lg px-6 py-12 md:px-12 lg:-mr-14"
              style="
                background: hsla(0, 0%, 100%, 0.55);
                backdrop-filter: blur(30px);
              "
            >
              <h2 class="text-3xl font-bold mb-6 pb-2">
                Обучение игре в бильярд
              </h2>
              <p class="text-gray-500 mb-6 pr-4 pb-2">
                Уровень своей игры можно хорошо поднять с&nbsp;помощью
                как серии уроков так и&nbsp;парочки (чтобы закрепить знания и&nbsp;навыки)
                <br/>
                <br/>
                Отправте свой телефон, позвоним расскажем о&nbsp;порядке и&nbsp;сроках
                обучения
                <br />
                <br />
                Первый урок: 1`000 ₽
              </p>
              <div v-if="1 == 2" class="flex flex-wrap mb-6">
                <div class="w-full md:w-4/12 mb-4">
                  <p class="flex items-center justify-center lg:justify-start">
                    <svg
                      class="w-4 h-4 mr-2 text-gray-900"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 512 512"
                    >
                      <path
                        fill="currentColor"
                        d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"
                      ></path>
                    </svg>
                    Урок 1-2 часа
                  </p>
                </div>
                <div class="w-full md:w-4/12 mb-4">
                  <p class="flex items-center justify-center lg:justify-start">
                    <svg
                      class="w-4 h-4 mr-2 text-gray-900"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 512 512"
                    >
                      <path
                        fill="currentColor"
                        d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"
                      ></path>
                    </svg>
                    Тактика
                  </p>
                </div>
                <div class="w-full md:w-4/12 mb-4">
                  <p class="flex items-center justify-center lg:justify-start">
                    <svg
                      class="w-4 h-4 mr-2 text-gray-900"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 512 512"
                    >
                      <path
                        fill="currentColor"
                        d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"
                      ></path>
                    </svg>
                    Точность
                  </p>
                </div>
                <div class="w-full md:w-4/12 mb-4">
                  <p class="flex items-center justify-center lg:justify-start">
                    <svg
                      class="w-4 h-4 mr-2 text-gray-900"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 512 512"
                    >
                      <path
                        fill="currentColor"
                        d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"
                      ></path>
                    </svg>
                    Техника
                  </p>
                </div>
                <div class="w-full md:w-4/12 mb-4">
                  <p class="flex items-center justify-center lg:justify-start">
                    <svg
                      class="w-4 h-4 mr-2 text-gray-900"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 512 512"
                    >
                      <path
                        fill="currentColor"
                        d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"
                      ></path>
                    </svg>
                    Красивые удары
                  </p>
                </div>
                <div class="w-full md:w-4/12 mb-4">
                  <p class="flex items-center justify-center lg:justify-start">
                    <svg
                      class="w-4 h-4 mr-2 text-gray-900"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 512 512"
                    >
                      <path
                        fill="currentColor"
                        d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"
                      ></path>
                    </svg>
                    Соревнования в Тюмени
                  </p>
                </div>
              </div>

              <div class="text-center">
                <input
                  type="text"
                  class="form-control inline-block xw-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                  id="exampleFormControlInput3"
                  placeholder="Ваш телефон"
                />

                <button
                  type="button"
                  xclass="inline-block px-7 py-3 bg-red-800 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-gray-900 hover:shadow-lg focus:bg-gray-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-900 active:shadow-lg transition duration-150 ease-in-out"
                  class="inline-block px-7 pt-3 pb-2 bg-red-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"
                  data-mdb-ripple="true"
                  data-mdb-ripple-color="light"
                >
                  Записаться
                </button>
              </div>
            </div>
          </div>

          <div>
            <img
              src="/site_ttt72/img/stols2.jpg"
              class="w-full rounded-lg shadow-lg"
              alt=""
            />
          </div>
        </div>
      </div>
      <!-- Jumbotron -->
    </section>
    <!-- Section: Design Block -->
  </div>
</template>

<script setup>
// import { ref } from 'vue'
// import axios from 'axios'
// import NewsItem from './10NewsItem.vue'

// // let $news = [
// //   {
// //     name: 'Стойка',
// //     date: '2022-05-15',
// //     type: 'youtube',
// //     link: 'OvA-01Nak6Y',
// //     opis: 'Первый выпуск видео школы игры в бильярд, стойка!',
// //   },
// // ]

// const news = ref({})
// const news_loading = ref(true)

// axios.get('http://localhost/api/ttt72/news').then((response) => {
//   news.value = response
//   news_loading.value = false
// })
</script>

<style scoped></style>
