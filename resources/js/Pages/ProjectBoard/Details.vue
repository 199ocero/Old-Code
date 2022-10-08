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
<script>
export default {
    methods: {
        showInstruction() {
            const instruction = document.getElementById("showInstruction");
            instruction.classList.toggle("flex");
            instruction.classList.toggle("hidden");
        },
    },
};
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
                {{ project.data.title }}
            </h1>
            <h1
                class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400"
            >
                {{ project.data.description }}
            </h1>
        </div>
    </section>

    <!-- Projects -->
    <section class="pb-20">
        <div class="flex justify-center space-x-20">
            <div class="container max-w-4xl">
                <div
                    class="rounded-lg bg-[#0E1726] py-2 px-5 mb-5 mx-3 md:mx-0 shadow"
                >
                    <div class="grid grid-cols-1 space-y-8">
                        <div class="flex items-center space-x-3 pt-5">
                            <div
                                class="relative w-5 h-5 text-white bg-[#ED4551] rounded-full flex justify-center items-center text-center p-5 shadow-lg shadow-[#ED4551]/20"
                            >
                                <p class="text-base text-uppercase">
                                    {{ project.data.user.name[0] }}
                                </p>
                            </div>
                            <p class="text-base font-semibold text-white">
                                {{ project.data.user.name }}
                            </p>
                        </div>
                        <div class="space-y-3">
                            <p class="text-sm text-gray-500">Instruction</p>
                            <span class="text-base font-semibold text-white">
                                <pre>{{ project.data.instruction }}</pre>
                            </span>
                        </div>
                        <div class="space-y-3">
                            <p class="text-sm text-gray-500">
                                Github URL
                                <font-awesome-icon
                                    icon="fa-solid fa-circle-info"
                                    class="cursor-pointer"
                                    @click="showInstruction()"
                                />
                            </p>
                            <p
                                id="showInstruction"
                                class="hidden text-sm font-semibold text-white bg-[#0b0c16] p-3 rounded"
                            >
                                You must send an approval request to the author
                                and wait for them to accept it before you can
                                view the project URL.
                            </p>
                            <Link
                                href="#"
                                as="button"
                                type="button"
                                class="bg-green-600 hover:bg-green-700 text-white text-sm font-medium py-2.5 px-2.5 rounded shadow-lg shadow-green-600/20"
                            >
                                <font-awesome-icon
                                    icon="fa-solid fa-share-from-square"
                                    class="ml-2"
                                />
                                Sent Request</Link
                            >
                        </div>

                        <div class="space-y-3">
                            <p class="text-sm text-gray-500">Category</p>
                            <div class="flex flex-wrap mt-2">
                                <span
                                    v-for="projectCategory in project.data
                                        .category"
                                    :key="projectCategory.id"
                                    class="text-sm font-medium mr-2 mb-2 px-2.5 py-0.5 rounded bg-indigo-600 text-white shadow-lg shadow-indigo-600/20"
                                >
                                    {{
                                        projectCategory.category.category
                                    }}</span
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
