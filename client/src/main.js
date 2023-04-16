import { createApp } from 'vue'
import { createPinia } from "pinia";

import App from "./App.vue";

import router from "@/router";
import Api from "@/services";

import './style.css'

const app = createApp(App);

/* Init Pinia */
app.use(createPinia());

app.use(router);
/* Init Api */
app.provide("$api", new Api());

app.mount("#app");

