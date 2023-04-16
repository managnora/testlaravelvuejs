<template>
    <form @submit.prevent="login">
        <!--Sign in section-->
        <div
            class="flex flex-row items-center justify-center lg:justify-start mb-6">
            <p class="mb-0 mr-4 text-lg">Sign in with</p>
        </div>

        <!-- Email input -->
        <div class="relative mb-6">
            <input
                type="email"
                id="email"
                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" "
                v-model="loginForm.email"
            />
            <label for="email" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Adresse e-mail</label>
        </div>

        <!-- Password input -->
        <div class="relative mb-6">
            <input
                type="password"
                id="password"
                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" "
                v-model="loginForm.password"
            />
            <label for="password" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Mot de passe</label>
        </div>

        <!-- Login button -->
        <div class="text-center lg:text-left">
            <button
                type="submit"
                class="inline-block rounded bg-primary px-7 pb-2.5 pt-3 text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                :disabled="loginForm.processing"
            >Login
            </button>
        </div>
    </form>
</template>
<script setup>
import { inject, reactive } from "vue";
import { useAuthStore } from "@/stores";
import router from "@/router";
const api = inject("$api");

const loginForm = reactive({
    email: "",
    password: "",
    processing: false
});

const login = () => {
    loginForm.processing = true;
    const { setUser } = useAuthStore();
    api.authApi.loginUser({
        email: loginForm.email,
        password: loginForm.password,
    }).then(({ success, data }) => {
        if(success) {
            setUser(data);
            router.push({ name: 'dashboardHome' });
        }
    }).catch((error) => {
        /*errorToast({
            text: error.data.message,
        });*/
    }).finally(() => {
        loginForm.processing = false;
    });
};
</script>
<style scoped>
button {
    border-radius: 8px;
    border: 1px solid transparent;
    padding: 0.6em 1.2em;
    font-size: 1em;
    font-weight: 500;
    font-family: inherit;
    background-color: #1a1a1a !important;
    cursor: pointer;
    transition: border-color 0.25s;
}
</style>
