<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";
import Pagination from "../../Components/Pagination.vue";
import TextInput from "@/Components/TextInput.vue";
import { ref, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import debounce from "lodash/debounce";

const props = defineProps({
  category: Object,
  filters: Object,
});

const search = ref(props.filters.search);

watch(
  search,
  debounce(function (value) {
    Inertia.get(
      "/category",
      { search: value },
      {
        preserveState: true,
        replace: true,
      }
    );
  }, 300)
);
</script>

<template>
  <AppLayout title="Category">
    <template #header>
      <h2 class="font-semibold text-xl text-white leading-tight">Category</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex flex-col-reverse
        md:justify-between
        md:flex-row
        items-center
        mx-auto mb-5">

          <div>
            <TextInput
            v-model="search"
              id="category"
              name="category"
              type="text"
              class="mt-1 block w-full"
              placeholder="Search Category..."
              required
            />
          </div>
          
          <Link
            href="category/create"
            as="button"
            type="button"
            class="
              mb-5
              md:mb-0
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
                    <th scope="col" class="py-3 px-6">Category</th>
                    <th scope="col" class="py-3 px-6">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                  v-for="category in props.category.data"
            :key="category.id"
                    class="
                      bg-white
                      border-b
                      dark:bg-gray-800 dark:border-gray-700
                    "
                  >
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
            <div class="bg-[#0E1726]">
              <div class="p-6 bg-[#0E1726] text-white">
                <Pagination :links="category.meta.links"></Pagination>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
