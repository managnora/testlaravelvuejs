import { defineConfig } from 'vite';
import { fileURLToPath, URL } from "node:url";
import vue from '@vitejs/plugin-vue'
import vueJSX from "@vitejs/plugin-vue-jsx";

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [vue(), vueJSX()],
  resolve: {
    alias: {
        "@": fileURLToPath(new URL("./src", import.meta.url)),
    },
  },
  server: {
    port: 8080
  },
})
