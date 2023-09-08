<template>
  <div class="container my-24 px-6 mx-auto">
    <!-- Section: Design Block -->
    <section class="mb-32 text-gray-800 text-center lg:text-left">
      <div class="px-6 py-12 md:px-12">
        <div class="container mx-auto xl:px-32">
          <div class="grid lg:grid-cols-2 flex items-center">
            <div class="md:mt-12 lg:mt-0 mb-12 lg:mb-0">
              <div
                class="relative block rounded-lg shadow-lg px-6 py-12 md:px-12 lg:-mr-14"
                style="
                  background: hsla(0, 0%, 100%, 0.55);
                  backdrop-filter: blur(30px);
                  z-index: 1;
                "
              >
                <h1
                  class="text-4xl md:text-5xl xl:text-6xl font-bold tracking-tight mb-12"
                >
                  Готовы начать
                  <br />
                  <span class="text-red-600">обучение, обсудим ?</span>
                </h1>
                <div class="md:flex flex-row">
                  <input
                    type="text"
                    class="form-control block w-full px-4 py-2 mb-2 md:mb-0 md:mr-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="Укажите свой телефон"
                  />
                  <button
                    type="submit"
                    class="inline-block px-7 py-3 bg-red-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"
                    data-mdb-ripple="true"
                    data-mdb-ripple-color="light"
                  >
                    Отправить
                  </button>
                </div>
              </div>
            </div>
            <div class="md:mb-12 lg:mb-0">
              <img
                src="https://mdbootstrap.com/img/new/ecommerce/vertical/056.jpg"
                class="w-full rounded-lg shadow-lg rotate-lg-6"
                alt=""
              />
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section: Design Block -->
  </div>
</template>

<script setup></script>

<style scoped>
@media (min-width: 992px) {
  .rotate-lg-6 {
    transform: rotate(3deg);
  }
}
</style>
