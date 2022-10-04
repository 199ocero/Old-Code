<script setup>
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
  href: String,
  as: String,
});
</script>

<template>
  <div>
    <button
      v-if="as == 'button'"
      type="submit"
      class="
        block
        w-full
        px-4
        py-2
        text-sm
        leading-5
        text-left text-white
        hover:bg-indigo-200 hover:text-indigo-600
        focus:outline-none focus:bg-indigo-600
        transition
      "
    >
      <slot />
    </button>

    <a
      v-else-if="as == 'a'"
      :href="href"
      class="
        block
        px-4
        py-2
        text-sm
        leading-5
        text-white
        hover:bg-indigo-200 hover:text-indigo-600
        focus:outline-none focus:bg-indigo-600
        transition
      "
    >
      <slot />
    </a>

    <Link
      v-else
      :href="href"
      class="
        block
        px-4
        py-2
        text-sm
        leading-5
        text-white
        hover:bg-indigo-200 hover:text-indigo-600
        focus:outline-none focus:bg-indigo-600
        transition
      "
    >
      <slot />
    </Link>
  </div>
</template>
