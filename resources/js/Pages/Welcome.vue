<script setup>
import { Head, Link } from "@inertiajs/vue3";

import FrontendLayout from "@/Layouts/Frontend.vue";
import Hero from "@/Components/Frontend/Hero.vue";
import Promote from "@/Components/Frontend/Promote.vue";
import About from "@/Components/Frontend/About.vue";
import Skills from "@/Components/Frontend/Skills.vue";
import Portfolio from "@/Components/Frontend/Portfolio.vue";
import Services from "@/Components/Frontend/Services.vue";
import Contact from "@/Components/Frontend/Contact.vue";

defineProps({
    skills: Object,
    projects: Object,
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
        <Portfolio :skills="skills" :projects="projects" />
        <!-- Services Section Secondary -->
        <Services />
        <!-- contact section Primary -->
        <Contact />
    </FrontendLayout>
</template>

<style></style>
