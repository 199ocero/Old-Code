<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm, Link } from "@inertiajs/inertia-vue3";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";

import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
  category: Object,
  errors: Object,
});

const form = useForm({
  category: props.category.category,
});

const submit = () => {
  Inertia.post(`/category/${props.category.id}`, {
    _method: "put",
    category: form.category,
  });
};
</script>

<template>
  <AppLayout title="Edit Category">
    <template #header>
      <h2 class="font-semibold text-xl text-white leading-tight">
        Edit Category
      </h2>
    </template>

    <div class="py-12">
      <div class="py-12 px-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
              <div class="sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-white">
                  Category
                </h3>
                <p class="mt-1 text-sm text-gray-500">
                  This information will be displayed publicly so be careful what
                  you share.
                </p>
              </div>
            </div>
            <div class="mt-5 md:col-span-2 md:mt-0">
              <form @submit.prevent="submit">
                <div class="shadow sm:overflow-hidden sm:rounded-md">
                  <div class="space-y-6 bg-[#0E1726] px-4 py-5 sm:p-6">
                    <div class="col-span-6 sm:col-span-3">
                      <InputLabel for="category" value="Category" />
                      <TextInput
                        id="category"
                        name="category"
                        v-model="form.category"
                        type="text"
                        class="mt-1 block w-full"
                        placeholder="Enter Category"
                        required
                        autofocus
                      />
                      <InputError
                        class="mt-2"
                        :message="form.errors.category"
                      />
                    </div>
                  </div>

                  <div class="bg-[#060714] px-4 py-3 text-right sm:px-6">
                    <button
                      type="submit"
                      class="
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
                    >
                      Update
                    </button>
                    <Link
                      href="/category"
                      as="button"
                      type="button"
                      class="
                        bg-red-600
                        hover:bg-red-700
                        text-white
                        font-bold
                        mr-2
                        py-2
                        px-4
                        rounded
                        shadow-lg shadow-red-600/20
                      "
                      >Cancel</Link
                    >
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
