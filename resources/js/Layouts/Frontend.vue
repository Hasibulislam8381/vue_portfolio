<script setup>
import Footer from "@/Components/Frontend/Footer.vue";
import Header from "@/Components/Frontend/Header.vue";
</script>

<template>
    <div class="bg-slate-200 dark:bg-slate-900">
        <!-- Header -->
        <Header />
        <main class="min-h-screen">
            <slot />
        </main>
        <!-- Footer -->
        <Footer />
    </div>
</template>
