<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Base Component</div>

          <div class="card-body">
            I'm an example component.
            <br />
            <br />
            0000
            <vi />
            1111
            <br />
            <br />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import vi from './vitrin/VitrinComponent.vue'

// export default {
//   components: {
//     vi,
//   },
//   mounted() {
console.log('Component mounted.')
//   }
//   ,
// }
</script>
