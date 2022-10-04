<template>
  <div class="flex">
    <template v-for="(link, key) in links" :key="key">
      <div
        v-if="link.url === null"
        class="
          mr-1
          mb-1
          px-4
          py-3
          text-sm
          leading-4
          text-gray-400
          bg-[#374151]
          rounded
        "
        v-html="link.label"
      ></div>
      <Link
        v-else
        class="
          mr-1
          mb-1
          px-4
          py-3
          text-sm
          leading-4
          border-solid border-2 border-indigo-600
          rounded
          hover:bg-indigo-600
          focus:border-indigo-600 focus:text-indigo-200
        "
        :class="{ 'bg-indigo-600 text-white': link.active }"
        :href="link.url"
        v-html="link.label"
      ></Link>
    </template>
  </div>
</template>
<script setup>
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
  links: Array,
});
</script>