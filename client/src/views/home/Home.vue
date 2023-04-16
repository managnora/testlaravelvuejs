<template>
    <section class="mx-auto">
        <div class="mb-6 flex items-center justify-between">
            <div class="flex items-center justify-start">
                <div class="mr-3 w-12 h-12 rounded-full dark:text-white bg-gray-50 dark:bg-slate-800">
                    <DocumentDuplicateIcon class="flex-shrink-0 w-full h-full p-2" aria-hidden="true" />
                </div>
                <h1 class="text-2xl leading-tight">
                    Tâches
                </h1>
            </div>
            <div class="flex items-center justify-start">
                <Button
                    iconOnly
                    variant="secondary"
                    v-slot="{ iconSizeClasses }"
                    srText="Ajouter"
                    class="w-full"
                    @click="modalActive = true"
                >
                    <PlusIcon aria-hidden="true" :class="iconSizeClasses" />
                    <span class="px-2">Nouveau tâche</span>
                </Button>
            </div>
        </div>
        <div class="flex flex-col">
            <div class="overflow-x-auto shadow-2xl p-10">
                <div v-for="(task, index) in tasks" :key="index">
                    <TreeTask :task="task" />
                </div>
            </div>
        </div>
        <CardBoxModal
            v-model="modalActive"
            title="Nouveau tâche"
            button-label="Enregistrer"
            has-cancel
            @confirm="saveTask"
        >
            <div>
                <div class="relative mb-6">
                    <treeselect
                        v-model="taskNewForm.parent_id"
                        :multiple="false"
                        :options="tasks"
                        placeholder="Sélectionner un parent "
                        :clearable="true"
                        :searchable="true"
                        :open-on-click="true"
                        :open-on-focus="true"
                        :clear-on-select="true"
                        :close-on-select="true"
                        :max-height="200"
                        noChildrenText="Aucune tâche fille"
                    />
                </div>
                <div class="relative mb-6">
                    <input
                        type="text"
                        id="name"
                        class="block px-2.5 py-2.5 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" "
                        v-model="taskNewForm.name"
                    />
                    <label for="name" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Libelle </label>
                </div>
            </div>
        </CardBoxModal>
    </section>
</template>

<script setup>
import {computed, inject, onMounted, reactive, ref} from "vue";
import { DocumentDuplicateIcon, PlusIcon } from  "@heroicons/vue/24/outline";
import Treeselect from 'vue3-treeselect'
import Button from "@/components/Button.vue";
import CardBoxModal from "@/components/CardBoxModal.vue";
import TreeTask from "@/views/home/TreeTask.vue";
import { useTaskStore } from "@/stores";
// import the styles
import 'vue3-treeselect/dist/vue3-treeselect.css'

const modalActive = ref(false);

const taskNewForm = reactive({
    parent_id: null,
    name: "",
    is_done: false
});

const api = inject("$api");
const taskStore = useTaskStore();

const tasks = computed(() => taskStore.tasks);
onMounted(async () => {
    await fetchTask();
});
console.log('tasks =>', tasks)
const fetchTask = async() => {
    await api.taskApi.getTasks().then(({ data }) => {
        taskStore.setTasks(data.tasks);
    }).catch((error) => {
        console.log('error =>', error)
        /*errorToast({
            text: error.data.message,
        });*/
    });
};

const saveTask = async() => {
    await api.taskApi.saveTask(taskNewForm).then(async () => {
        await fetchTask();
    }).catch((error) => {
        console.log('error =>', error)
        /*errorToast({
            text: error.data.message,
        });*/
    });
};
</script>

<style scoped lang="scss">

</style>
