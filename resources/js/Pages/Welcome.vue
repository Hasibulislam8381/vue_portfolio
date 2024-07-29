<script setup>
import { Head, Link } from "@inertiajs/vue3";

import FrontendLayout from "@/Layouts/Frontend.vue";
import Hero from "@/Components/Frontend/Hero.vue";
import Promote from "@/Components/Frontend/Promote.vue";
import About from "@/Components/Frontend/About.vue";
import Skills from "@/Components/Frontend/Skills.vue";

defineProps({
    skills: Object,
});
</script>

<template>
    <Head title="Welcome to my portfolio"></Head>
    <FrontendLayout>
        <!-- Hero section primary -->
        <Hero />

        <!-- Promotion Section tail 100 -->
        <Promote />
        <!-- About Section  secondary-->
        <About />
        <!-- Skills section tail-100 -->
        <Skills :skills="skills" />
        <!-- Porfolio Section Primary -->
        <!-- Services Section Secondary -->
        <!-- contact section Primary -->
    </FrontendLayout>
</template>

<style></style>
