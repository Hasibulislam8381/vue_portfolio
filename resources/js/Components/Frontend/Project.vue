<script setup>
import { Link } from "@inertiajs/inertia-vue3";
defineProps({
    project: Object,
});
</script>
<template>
    <div
        class="w-full max-w-sm bg-light-tail-500 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 transition-transform duration-300 ease-in-out transform hover:scale-105"
    >
        <Link
            :href="project.project_url"
            class="group flex flex-col items-center text-center cursor-pointer"
            v-motion
            :initial="{
                opacity: 0,
                y: 100,
            }"
            :enter="{
                opacity: 1,
                y: 0,
            }"
        >
            <div class="mb-6 mt-6">
                <img
                    class="rounded-2xl h-40"
                    :src="project.image"
                    :alt="project.name"
                />
            </div>
            <span
                class="group-hover:text-accent capitalize text-accent text-sm mb-3"
            >
                {{ project.skill.name }}
            </span>
            <h3
                class="group-hover:text-dark text-2xl font-semibold capitalize mb-3"
            >
                {{ project.name }}
            </h3>
        </Link>
    </div>
</template>
