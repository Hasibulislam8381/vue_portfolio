<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
    skills: Array,
    project: Object,
});
const form = useForm({
    name: props.project?.name,
    image: null,
    project_url: props.project?.project_url,
    skill_id: props.project?.skill_id,
});

const submit = () => {
    Inertia.post(`/projects/${props.project.id}`, {
        _method: "put",
        name: form.name,
        image: form.image,
        project_url: form.project_url,
        skill_id: form.skill_id,
    });
};
</script>

<template>
    <Head title="New Project" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                New Project
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-md mx-auto sm:px-6 lg:px-8 bg-white">
                <form class="p-4" @submit.prevent="submit">
                    <div>
                        <InputLabel for="name" value="Skills" />
                        <select
                            v-model="form.skill_id"
                            name="skill_id"
                            id="skill_id"
                            class="mt-1 block w-full"
                        >
                            <option
                                v-for="skill in skills"
                                :key="skill.id"
                                :value="skill.id"
                            >
                                {{ skill.name }}
                            </option>
                        </select>
                        <InputError
                            class="mt-2"
                            :message="$page.props.errors.skill_id"
                        />
                    </div>
                    <div>
                        <InputLabel for="name" value="Name" />

                        <TextInput
                            id="name"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.name"
                        />
                        <InputError
                            class="mt-2"
                            :message="$page.props.errors.name"
                        />
                    </div>
                    <div>
                        <InputLabel for="project_url" value="URL" />

                        <TextInput
                            id="project_url"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.project_url"
                        />
                        <InputError
                            class="mt-2"
                            :message="$page.props.errors.project_url"
                        />
                    </div>
                    <div class="m-2">
                        <InputLabel for="image" value="Image" />
                        <TextInput
                            id="image"
                            type="file"
                            class="mt-1 block w-full"
                            @input="form.image = $event.target.files[0]"
                        />
                        <InputError
                            class="mt-2"
                            :message="$page.props.errors.image"
                        />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <PrimaryButton
                            class="ms-4"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Store
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
