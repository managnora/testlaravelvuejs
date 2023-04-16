<template>
    <section class="h-full">
        <div class="h-full flex justify-center my-52">
            <!-- Left column container with background-->
            <div
                class="g-6 flex h-full flex-wrap items-center justify-center lg:justify-between">
                <div
                    class="shrink-1 mb-12 grow-0 basis-auto md:mb-0 md:w-9/12 md:shrink-0 lg:w-6/12 xl:w-6/12">
                    <img
                        src="@/assets/img/draw2.webp"
                        class="w-full"
                        alt="Sample image" />
                </div>
                <!-- Right column container -->
                <div class="mb-12 md:mb-0 md:w-8/12 lg:w-5/12 xl:w-5/12">
                    <router-view v-slot="{ Component, route }">
                        <FadeTransition>
                            <div :key="route.name">
                                <component :is="Component" />
                            </div>
                        </FadeTransition>
                    </router-view>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import FadeTransition from "@/components/transitions/FadeTransition.vue";
</script>

<style scoped>
</style>
