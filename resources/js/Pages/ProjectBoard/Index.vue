<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import TextInput from "@/Components/TextInput.vue";
import Pagination from "../../Components/Pagination.vue";
defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    project: Object,
});
</script>

<template>
    <Head title="Project Board" />

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
                    <Link
                        :href="route('project-board.index')"
                        :class="{
                            underline:
                                route('project-board.index') ===
                                route('project-board.index'),
                        }"
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
    <section class="relative py-20 mt-20">
        <div
            class="z-0 absolute top-1 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-white rounded-full blur-[250px] opacity-40"
        ></div>
        <div
            class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12"
        >
            <h1
                class="mb-4 text-4xl font-semibold tracking-tight leading-none text-white md:text-5xl lg:text-6x"
            >
                Find some AWESOME projects
            </h1>
            <h1
                class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400"
            >
                Thousands of old projects posted all over the world
            </h1>
        </div>
    </section>

    <!-- Projects -->
    <section class="pb-20">
        <div class="flex justify-center space-x-20">
            <div v-if="project.data.length == 0">
                <h2 class="font-semibold text-xl text-gray-500 px-4 md:px-0">
                    No project created.
                </h2>
            </div>
            <div v-else class="container">
                <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                    <div
                        v-for="project in project.data"
                        :key="project.id"
                        class="rounded-lg bg-[#0E1726] p-6"
                    >
                        <div class="space-y-5">
                            <div class="flex items-center space-x-3 mb-3">
                                <div
                                    class="relative w-5 h-5 text-white bg-[#ED4551] rounded-full flex justify-center items-center text-center p-5 shadow-lg shadow-[#ED4551]/20"
                                >
                                    <p class="text-base text-uppercase">
                                        {{ project.user.name[0] }}
                                    </p>
                                </div>
                                <p class="text-base font-semibold text-white">
                                    {{ project.user.name }}
                                </p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Title</p>
                                <p
                                    class="text-lg font-semibold text-white line-clamp-2"
                                >
                                    {{ project.title }}
                                </p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Description</p>
                                <p
                                    class="text-base font-semibold text-white line-clamp-3"
                                >
                                    {{ project.description }}
                                </p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Category</p>
                                <div class="flex flex-wrap mt-2">
                                    <span
                                        v-for="projectCategory in project.category"
                                        :key="projectCategory.id"
                                        class="text-sm font-medium mr-2 mb-2 px-2.5 py-0.5 rounded bg-gray-700 text-gray-300"
                                    >
                                        {{
                                            projectCategory.category.category
                                        }}</span
                                    >
                                </div>
                            </div>
                            <hr class="bg-gray-500 opacity-20" />
                            <div class="text-center">
                                <Link
                                    :href="
                                        route('project-board.show', project.id)
                                    "
                                    as="button"
                                    type="button"
                                    class="text-sm bg-indigo-600 hover:bg-indigo-700 text-white font-bold mr-2 py-2 px-4 rounded shadow-lg shadow-indigo-600/20"
                                    >See project</Link
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-[#0E1726] text-white mt-5 p-6 rounded-lg">
                    <Pagination :links="project.meta.links"></Pagination>
                </div>
            </div>
        </div>
    </section>
</template>
