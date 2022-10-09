<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";

const props = defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    project: Object,
});

const form = useForm({
    request: "",
});

const submit = () => {
    form.post(route("request.store", props.project.data.id));
};
</script>

<template>
    <Head title="Project Request" />

    <!-- Navbar -->
    <nav class="fixed w-full p-3 z-20 top-0 left-0 bg-[#060818]">
        <div class="container flex justify-between items-center mx-auto">
            <!-- Logo -->
            <div>
                <Link href="/"
                    ><svg
                        class="w-16 h-16"
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
                            <rect
                                x="16"
                                y="16"
                                width="16"
                                height="15"
                                fill="#6975F5"
                            />
                        </g>
                        <defs>
                            <clipPath id="clip0_215_63">
                                <rect width="48" height="48" fill="white" />
                            </clipPath>
                        </defs></svg
                ></Link>
            </div>
            <!-- Button -->
            <div class="flex space-x-12">
                <!-- Menu Items -->
                <div class="space-x-12 text-white">
                    <Link :href="route('project-board.index')"
                        >Project Board</Link
                    >
                </div>
                <div v-if="canLogin">
                    <Link
                        v-if="$page.props.user"
                        :href="route('dashboard')"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded shadow-lg shadow-indigo-600/20"
                        >Dashboard</Link
                    >

                    <template v-else>
                        <Link
                            :href="route('login')"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded shadow-lg shadow-indigo-600/20"
                            >Log in</Link
                        >

                        <Link
                            v-if="canRegister"
                            :href="route('register')"
                            class="ml-4 bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded shadow-lg shadow-gray-600/20"
                            >Register</Link
                        >
                    </template>
                </div>
            </div>
        </div>
    </nav>
    <section class="relative pt-20 mt-20">
        <div
            class="z-0 absolute top-1 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-white rounded-full blur-[250px] opacity-40"
        ></div>
        <div
            class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12"
        >
            <h1
                class="mb-4 text-4xl font-semibold tracking-tight leading-none text-white md:text-5xl lg:text-6x"
            >
                {{ props.project.data.title }}
            </h1>
        </div>
    </section>

    <!-- Projects -->
    <section class="pb-20 z-50">
        <div class="flex justify-center space-x-20">
            <div class="container max-w-4xl">
                <div class="mt-5 md:col-span-2 md:mt-0">
                    <form @submit.prevent="submit">
                        <div class="shadow sm:overflow-hidden sm:rounded-md">
                            <div
                                class="space-y-6 bg-[#0E1726] px-4 py-5 sm:p-6 z-10"
                            >
                                <div class="col-span-6 sm:col-span-3">
                                    <InputLabel
                                        for="request"
                                        value="Request Permission"
                                    />
                                    <textarea
                                        id="request"
                                        name="request"
                                        v-model="form.request"
                                        type="text"
                                        class="mt-1 block w-full text-white bg-[#1B2E4B] focus:border-indigo-600 focus:ring-indigo-600 border-none rounded-md shadow-sm"
                                        :placeholder="
                                            'Hi ' +
                                            props.project.data.user.name +
                                            ', I want to continue this wonderfull project...'
                                        "
                                        rows="5"
                                        autofocus
                                    />
                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.request"
                                    />
                                </div>
                            </div>
                            <div
                                class="bg-[#060714] px-4 py-3 text-right sm:px-6"
                            >
                                <button
                                    type="submit"
                                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold mr-2 py-2 px-4 rounded shadow-lg shadow-indigo-600/20"
                                >
                                    Sent Request
                                </button>
                                <Link
                                    :href="
                                        route(
                                            'project-board.show',
                                            props.project.data.id
                                        )
                                    "
                                    as="button"
                                    type="button"
                                    class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded shadow-lg shadow-red-600/20"
                                    >Cancel</Link
                                >
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</template>
