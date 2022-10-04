<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm, Link } from "@inertiajs/inertia-vue3";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import Multiselect from "vue-multiselect";

defineProps({
  category: Object,
});
const form = useForm({
  title: "",
  description: "",
  instruction: "",
  url: "",
  category: [],
});

const submit = () => {
  form.post(route("projects.store"));
};
</script>
<style>
.multiselect__tags {
  background: #1b2e4b !important;
  border: none !important;
}
.multiselect__placeholder {
  color: #676e7c !important;
}
.multiselect__content-wrapper {
  background: #1b2e4b !important;
  border: none !important;
}
.multiselect__content {
  color: white;
}
.multiselect__single {
  background: #1b2e4b !important;
  border: none !important;
  color: white;
}
.multiselect__input {
  background: #1b2e4b !important;
}
</style>
<style src="vue-multiselect/dist/vue-multiselect.css"></style>

<template>
  <AppLayout title="Create Project">
    <template #header>
      <h2 class="font-semibold text-xl text-white leading-tight">
        Create Project
      </h2>
    </template>

    <div class="py-12">
      <div class="py-12 px-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
              <div class="sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-white">
                  Project
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
                      <InputLabel for="title" value="Project Title" />
                      <TextInput
                        id="title"
                        name="title"
                        v-model="form.title"
                        type="text"
                        class="mt-1 block w-full"
                        placeholder="Enter Project Title"
                        required
                        autofocus
                      />
                      <InputError class="mt-2" :message="form.errors.title" />
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                      <InputLabel for="description" value="Description" />
                      <TextInput
                        id="description"
                        name="description"
                        v-model="form.description"
                        type="text"
                        class="mt-1 block w-full"
                        placeholder="Enter Description"
                        required
                      />
                      <InputError
                        class="mt-2"
                        :message="form.errors.description"
                      />
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                      <InputLabel for="instruction" value="Instruction" />
                      <textarea
                        id="instruction"
                        name="instruction"
                        v-model="form.instruction"
                        type="text"
                        class="
                          mt-1
                          block
                          w-full
                          text-white
                          bg-[#1B2E4B]
                          focus:border-indigo-600 focus:ring-indigo-600
                          border-none
                          rounded-md
                          shadow-sm
                        "
                        placeholder="Enter Instruction"
                        rows="5"
                        required
                      />
                      <InputError
                        class="mt-2"
                        :message="form.errors.instruction"
                      />
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                      <InputLabel for="url" value="Github URL" />
                      <TextInput
                        id="url"
                        name="url"
                        v-model="form.url"
                        type="text"
                        class="mt-1 block w-full"
                        placeholder="Enter Github URL"
                        required
                      />
                      <InputError class="mt-2" :message="form.errors.url" />
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                      <InputLabel for="category" value="Category" />
                      <div>
                        <multiselect
                          v-model="form.category"
                          :options="category.data"
                          :multiple="true"
                          :close-on-select="false"
                          :clear-on-select="false"
                          :preserve-search="true"
                          placeholder="Select Category"
                          label="category"
                          track-by="category"
                        ></multiselect>
                      </div>
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
                        bg-blue-600
                        hover:bg-blue-700
                        text-white
                        font-bold
                        mr-3
                        py-2
                        px-4
                        rounded
                      "
                    >
                      Save
                    </button>
                    <Link
                      href="/projects"
                      as="button"
                      type="button"
                      class="
                        bg-red-600
                        hover:bg-red-700
                        text-white
                        font-bold
                        py-2
                        px-4
                        rounded
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
