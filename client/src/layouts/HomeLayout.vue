<template>
    <div class="min-h-screen text-gray-900 dark:bg-dark-bg dark:text-gray-100">
        <aside style="transition-property: width, transform; transition-duration: 150ms" class="fixed inset-y-0 z-20 py-4 flex flex-col space-y-6 bg-white shadow-lg dark:bg-dark-eval-1 translate-x-0 w-0">
        </aside>
        <div class="min-h-screen flex flex-col ml-0">
            <Navbar />
            <router-view v-slot="{ Component, route }">
                <FadeTransition>
                    <div :key="route.name">
                        <component :is="Component" />
                    </div>
                </FadeTransition>
            </router-view>
        </div>
    </div>
</template>

<script setup>
import FadeTransition from "@/components/transitions/FadeTransition.vue";
import Navbar from "@/components/Navbar.vue";
</script>
