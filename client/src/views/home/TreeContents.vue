<template>
    <div v-for="(taskChild, key) in taskChildren" :key="key" class="ml-5">
        <TreeTask :task="taskChild" :key="key"/>
    </div>
</template>

<script setup>
import { computed } from "vue";
import TreeTask from "@/views/home/TreeTask.vue";
const props = defineProps({
    taskChild: {
        type: Array,
        default: () => ([]),
    }
});
const taskChildren = computed(() => props.taskChild);
</script>

<style scoped>

</style>
