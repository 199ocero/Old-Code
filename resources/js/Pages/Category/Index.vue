<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
  category: Object,
});
</script>

<template>
  <AppLayout title="Category">
    <template #header>
      <h2 class="font-semibold text-xl text-white leading-tight">Category</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-end mb-5">
          <Link
            href="category/create"
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
            >Create Category</Link
          >
        </div>

        <div class="overflow-hidden shadow-sm rounded-lg">
          <div class="overflow-x-auto relative px-5 md:px-0">

            <div class="overflow-x-auto relative">
              <table
                class="
                  w-full
                  text-sm text-left text-gray-500
                  dark:text-gray-400 rounded
                "
              >
                <thead
                  class="
                    text-xs text-gray-700
                    uppercase
                    bg-gray-50
                    dark:bg-gray-700 dark:text-gray-400
                  "
                >
                  <tr>
                    <th scope="col" class="py-3 px-6">No</th>
                    <th scope="col" class="py-3 px-6">Category</th>
                    <th scope="col" class="py-3 px-6">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                  v-for="(category, itemObjKey) in category.data"
            :key="category.id"
                    class="
                      bg-white
                      border-b
                      dark:bg-gray-800 dark:border-gray-700
                    "
                  >
                  <td class="py-4 px-6">{{itemObjKey+1}}</td>
                    <th
                      scope="row"
                      class="
                        py-4
                        px-6
                        font-medium
                        text-gray-900
                        whitespace-nowrap
                        dark:text-white
                      "
                    >
                      {{category.category}}
                    </th>
                    
                    <td class="py-4 px-6">
                      <th>
                            <Link
                      :href="route('category.edit', category.id)"
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
                      :href="route('category.destroy', category.id)"
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
                    
                  </th>   
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
