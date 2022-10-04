<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Components/Welcome.vue";
</script>

<template>
  <AppLayout title="Dashboard">
    <template #header>
      <h2 class="font-semibold text-xl text-white leading-tight">Dashboard</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-[#0E1726] overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-[#0E1726] text-white">
            <h1>Hello this is project.</h1>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
