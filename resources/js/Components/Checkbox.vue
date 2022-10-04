<script setup>
import { computed } from "vue";

const emit = defineEmits(["update:checked"]);

const props = defineProps({
  checked: {
    type: [Array, Boolean],
    default: false,
  },
  value: {
    type: String,
    default: null,
  },
});

const proxyChecked = computed({
  get() {
    return props.checked;
  },

  set(val) {
    emit("update:checked", val);
  },
});
</script>


<template>
  <input
    v-model="proxyChecked"
    type="checkbox"
    :value="value"
    class="
      rounded
      bg-[#1B2E4B]
      border-none
      text-indigo-600
      shadow-sm
      focus:border-indigo-600
      focus:ring
      focus:ring-indigo-600
      focus:ring-opacity-50
    "
  />
</template>
