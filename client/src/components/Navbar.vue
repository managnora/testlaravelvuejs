<template>
    <nav
        aria-label="secondary"
        class="sticky mt-16 z-10 px-6 py-4 bg-white flex items-center justify-between transition-transform duration-500 dark:bg-dark-eval-1 -translate-y-full"
    >
        <div class="flex items-center gap-2">

        </div>

        <div class="flex items-center gap-2">

            <!-- Dropdwon -->
            <Dropdown align="right" width="48">
                <template #trigger>
                    <button
                        class="flex text-sm p-0 transition border-2 border-transparent focus:outline-none focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark-eval-1"
                    >
                        <img
                            class="object-cover w-8 h-8 rounded-full"
                            :src="avatar"
                            alt="User Name"
                        />
                    </button>
                </template>
                <template #content>
                    <Button
                        iconOnly
                        variant="secondary"
                        v-slot="{ iconSizeClasses }"
                        srText="Déconnexion"
                        class="w-full"
                        @click="logout"
                    >
                        <ArrowRightOnRectangleIcon aria-hidden="true" :class="iconSizeClasses" />
                        <span class="px-2">Déconnexion</span>
                    </Button>
                </template>
            </Dropdown>
        </div>
    </nav>
</template>

<script setup>
import { computed, inject, onMounted, onUnmounted, ref } from "vue";
import {
    ArrowRightOnRectangleIcon
} from "@heroicons/vue/24/outline";
import Button from "@/components/Button.vue";
import Dropdown from "@/components/Dropdown.vue";
import avatar from "@/assets/avatar.webp";
import { useAuthStore } from '@/stores';
import router from '@/router';

const api = inject("$api");


const authStore = useAuthStore();

const user = computed(() => authStore.user);

const logout = async () => {
    api.authApi.logoutUser().then(async(response) => {
        await authStore.deleteSession();
        await router.push({ name: 'Login' });
    })
};


</script>
