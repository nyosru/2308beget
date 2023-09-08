<template>
  <tr>
    <td>
      <label for="name">
        <slot />
        <b v-if="data.required" class="required">*</b>
        <br/>data: {{ data }}
      </label>
    </td>
    <td>
      <div class="xform-group">
        <textarea
        v-model="local"
          xid="name"
          xtype="text"
          xstyle="width: 100%;"
          xrel=""
          xrequired=""
          xv-model="name"
        ></textarea>
      </div>
    </td>
  </tr>
</template>

<script setup>
import { ref, computed, watch } from 'vue'

const props = defineProps({
  data: { type: Object },
  modelValue: {
    type: String,
  },
})

const emit = defineEmits(['update:modelValue'])

const local = ref(props.modelValue)

watch(local, (newValue) => {
  emit('update:modelValue', newValue)
})

watch(
  () => props.modelValue,
  (newValue) => {
    local.value = newValue
  },
)
</script>

<style scoped>
.required{ 
  padding-left: 5px;
  color: red; }
</style>