<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
defineProps({
    AllSkill: Object,
});
</script>

<template>
    <Head title="ALl Skills Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                All Skill
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-end m-2 p-2">
                    <Link
                        :href="route('all-skills.create')"
                        class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded-md"
                        >New Skill</Link
                    >
                </div>
            </div>
        </div>

        <div class="relative overflow-x-auto">
            <table
                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
            >
                <thead
                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                >
                    <tr>
                        <th scope="col" class="px-6 py-3">Id</th>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Image</th>
                        <th scope="col" class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="skill in AllSkill.data"
                        :key="skill.id"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                    >
                        <th
                            scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                        >
                            {{ skill.id }}
                        </th>
                        <td class="px-6 py-4">{{ skill.name }}</td>
                        <td class="px-6 py-4">
                            <img class="w-13 h-12" :src="skill.image" alt="" />
                        </td>
                        <td class="px-6 py-4">
                            <Link
                                :href="route('all-skills.edit', skill.id)"
                                class="font-medium text-blue-500 hover:text-blue-700"
                                >Edit</Link
                            >
                            <Link
                                :href="route('all-skills.destroy', skill.id)"
                                class="font-medium text-red-500 hover:text-red-700"
                                method="delete"
                                as="button"
                                type="button"
                                >Delete</Link
                            >
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AuthenticatedLayout>
</template>
