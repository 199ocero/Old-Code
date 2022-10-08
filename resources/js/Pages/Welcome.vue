<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import TextInput from "@/Components/TextInput.vue";
defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    project: Object,
});
</script>

<template>
    <Head title="Welcome" />

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
                    <Link href="project-board">Project Board</Link>
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
                class="mb-4 text-6xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white"
            >
                OLDCODE
            </h1>
            <h1
                class="mb-4 text-4xl font-semibold tracking-tight leading-none text-white md:text-5xl lg:text-6x"
            >
                The code-sharing platform for developers
            </h1>
            <p
                class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400"
            >
                Here at OldCode, we put a lot of emphasis on developers who wish
                to share their old abandoned projects and enable other
                developers to continue to see the end results.
            </p>
            <div
                class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4"
            >
                <p
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white"
                >
                    Learn more
                    <svg
                        class="ml-2 -mr-1 w-5 h-5"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                        ></path>
                    </svg>
                </p>
                <a
                    href="#"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800"
                >
                    <svg
                        class="mr-2 -ml-1 w-5 h-5"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"
                        ></path>
                    </svg>
                    Watch video
                </a>
            </div>
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
            <div v-else class="container max-w-4xl">
                <p
                    class="text-2xl font-normal text-center text-gray-500 dark:text-gray-400 mb-5"
                >
                    Here are the latest project posts
                </p>
                <div
                    v-for="project in project.data"
                    :key="project.id"
                    class="rounded-lg bg-[#0E1726] py-2 px-5 mb-5 mx-3 md:mx-0 cursor-pointer shadow hover:shadow-lg hover:bg-gradient-to-l from-gray-700 hover:scale-105 duration-200"
                >
                    <div class="grid grid-cols-1">
                        <div class="flex justify-between">
                            <div class="flex items-center space-x-3">
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
                            <Link
                                :href="route('project-board.show', project.id)"
                                as="button"
                                type="button"
                                class="text-sm bg-indigo-600 hover:bg-indigo-700 px-5 text-white font-bold rounded shadow-lg shadow-indigo-600/20"
                                >See project</Link
                            >
                        </div>

                        <p class="text-sm text-gray-500 mt-3">Title</p>
                        <p class="text-base font-semibold text-white truncate">
                            {{ project.title }}
                        </p>
                        <p class="text-sm text-gray-500">Description</p>
                        <p class="text-base font-semibold text-white truncate">
                            {{ project.description }}
                        </p>
                        <div class="flex flex-wrap mt-2">
                            <span
                                v-for="projectCategory in project.category"
                                :key="projectCategory.id"
                                class="text-sm font-medium mr-2 mb-2 px-2.5 py-0.5 rounded bg-indigo-600 text-white shadow-lg shadow-indigo-600/20"
                            >
                                {{ projectCategory.category.category }}</span
                            >
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <Link
                        href="project-board"
                        class="underline text-white font-bold text-2xl hover:text-indigo-300"
                        >See all projects</Link
                    >
                </div>
            </div>
        </div>
    </section>
</template>
