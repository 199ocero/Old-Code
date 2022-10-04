<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
  project: Object,
  projectCategory: Object,
});
</script>

<template>
  <AppLayout title="Projects">
    <template #header>
      <h2 class="font-semibold text-xl text-white leading-tight">Projects</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-end mb-5">
          <Link
            href="projects/create"
            as="button"
            type="button"
            class="
              mr-5
              md:mr-0
              bg-indigo-600
              hover:bg-indigo-700
              text-white
              font-bold
              py-2
              px-4
              rounded
              shadow-lg shadow-indigo-600/20
            "
            >Create Project</Link
          >
        </div>
        <div v-if="project.data.length == 0">
          <h2 class="font-semibold text-xl text-gray-500 px-4 md:px-0">
            No project created.
          </h2>
        </div>
        <div v-else class="grid grid-cols-1 md:grid-cols-3 gap-12 px-5 md:px-0">
          <div
            v-for="project in project.data"
            :key="project.id"
            class="rounded-lg bg-[#0E1726] p-6"
          >
            <div class="space-y-5">
              <div>
                <p class="text-sm text-gray-500">Title</p>
                <p class="text-2xl font-semibold text-white truncate">
                  {{ project.title }}
                </p>
              </div>
              <div>
                <p class="text-sm text-gray-500">Description</p>
                <p class="text-base font-semibold text-white truncate">
                  {{ project.description }}
                </p>
              </div>
              <div>
                <p class="text-sm text-gray-500">Instruction</p>
                <p class="text-base font-semibold text-white truncate">
                  {{ project.instruction }}
                </p>
              </div>
              <div>
                <p class="text-sm text-gray-500">Github URL</p>
                <a
                  :href="project.url"
                  target="_blank"
                  class="text-white hover:text-indigo-300"
                  >{{ project.url }}</a
                >
              </div>
              <div>
                <p class="text-sm text-gray-500">Category</p>
                <div class="flex flex-wrap mt-2">
                  <span
                    v-for="projectCategory in project.category"
                    :key="projectCategory.id"
                    class="
                      text-sm
                      font-medium
                      mr-2
                      mb-2
                      px-2.5
                      py-0.5
                      rounded
                      bg-gray-700
                      text-gray-300
                    "
                  >
                    {{ projectCategory.category.category }}</span
                  >
                </div>
              </div>
              <hr class="bg-gray-500 opacity-20" />
              <div class="text-right">
                <Link
                  :href="route('projects.edit', project.id)"
                  as="button"
                  type="button"
                  class="
                    text-sm
                    bg-indigo-600
                    hover:bg-indigo-700
                    text-white
                    font-bold
                    mr-2
                    py-2
                    px-4
                    rounded
                    shadow-lg shadow-indigo-600/20
                  "
                  >Edit</Link
                >
                <Link
                  :href="route('projects.destroy', project.id)"
                  method="DELETE"
                  as="button"
                  type="button"
                  class="
                    text-sm
                    bg-red-600
                    hover:bg-red-700
                    text-white
                    font-bold
                    py-2
                    px-4
                    rounded
                    shadow-lg shadow-red-600/20
                  "
                  >Delete</Link
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
