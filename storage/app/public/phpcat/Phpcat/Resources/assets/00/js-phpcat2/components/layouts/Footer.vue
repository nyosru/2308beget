<template>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-6 text-center">
          <p clss="p-0 m-0">Все права защищены &copy; {{ year }}</p>
        </div>
        <div class="col-xs-12 col-sm-6 text-center">
          <p clss="p-0 m-0">
            Сделано в
            <a href="https://php-cat.com" target="_blank">php-cat.com</a>
          </p>
        </div>
      </div>
    </div>
  </footer>
</template>

<script setup>
const year = new Date().getFullYear()
</script>

<style lang="scss" scoped>
footer {
  // background: #d8d8d8;
  background-color: rgba(0, 0, 0, 0.1);
  /* position: absolute; */
  /* bottom: 0; */
  width: 100%;

  p {
    margin: 0;
    padding: 0;
    // padding: 5px;
    // text-align: center;
  }
  // span {
  //   color: red;
  // }
}
</style>
