<script setup>
import { Link } from "@inertiajs/inertia-vue3";
</script>

<template>
  <Link :href="'/'">
    <svg
      class="w-20 h-20"
      viewBox="0 0 48 48"
      fill="none"
      xmlns="http://www.w3.org/2000/svg"
    >
      <g clip-path="url(#clip0_215_63)">
        <path
          d="M28.7 12.25H34.45L46.55 23.7L34.45 35.2H28.7L40.8 23.7L28.7 12.25Z"
          fill="#6975F5"
        />
        <path
          d="M19.3 12.25H13.55L1.45 23.7L13.55 35.2H19.3L7.2 23.7L19.3 12.25Z"
          fill="#6975F5"
        />
        <rect x="16" y="16" width="16" height="15" fill="#6975F5" />
      </g>
      <defs>
        <clipPath id="clip0_215_63">
          <rect width="48" height="48" fill="white" />
        </clipPath>
      </defs>
    </svg>
  </Link>
</template>
