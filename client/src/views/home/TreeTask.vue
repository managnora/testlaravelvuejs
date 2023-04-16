<template>
    <div class="flex justify-between mt-2 pt-0">
        <div class="flex items-center ">
            <BaseIcon
                v-if="taskItem.children.length > 0"
                :path="taskItem.is_open ? mdiChevronDown : mdiChevronRight"
                class="flex-none"
                w="w-12"
                @click="openChild(taskItem)"
            />
            <span v-else class="w-12 h-12"></span>
            <label class="ev-checkbox-input">
                <input type="checkbox" :data-tristate="taskItem.is_done?CHECKBOX_TRISTATE_ALL:CHECKBOX_TRISTATE_NONE" @change="selectTask(taskItem)">
                <div class="ev-checkbox-input__check" />
            </label>
            <div class="ml-4" @click="openChild(taskItem)">
                {{ displayTaskLabel(taskItem) }}
            </div>
        </div>
        <div class="text-right">
            <BaseIcon
                :path="taskItem.is_done ? mdiCheck : mdiProgressClock"
                class="flex-none"
                :class="[{ 'text-green': taskItem.is_done}]"
                w="w-12"
            />
            <BaseIcon
                :path="mdiTrashCan"
                class="flex-none text-red-600 hover:cursor-pointer"
                w="w-12"
                @click="deleteTask(taskItem)"
            />
        </div>
    </div>
    <div v-show="taskItem.is_open">
        <TreeContents v-if="taskItem.children.length > 0" :taskChild="taskItem.children" />
    </div>
</template>

<script setup>
import {computed, inject, ref} from "vue";
import TreeContents from "@/views/home/TreeContents.vue";
import { mdiChevronDown, mdiChevronRight, mdiCheck, mdiProgressClock, mdiTrashCan } from "@mdi/js";
import BaseIcon from "@/components/BaseIcon.vue";
import { useTaskStore } from "@/stores";

const CHECKBOX_TRISTATE_NONE = '0';
const CHECKBOX_TRISTATE_SOME = '1';
const CHECKBOX_TRISTATE_ALL = '2';

const api = inject("$api");

const props = defineProps({
    task: {
        type: Object,
        default: () => ({}),
    }
});

const childrenSelectedTask = ref([]);

const taskItem = computed(() => props.task);
const taskStore = useTaskStore();

const displayTaskLabel = (task) => {
    return task.label?.toUpperCase();
};

const selectTask = (task) => {
    // eslint-disable-next-line no-param-reassign
    task.is_done = !task.is_done;
    checkChildren(task);

    updateTask(task);
};

const checkChildren = (task) => {
    task.children.forEach((subTask) => {
        subTask.is_done = !subTask.is_done;
        childrenSelectedTask.value.push(subTask.id);
        checkChildren(subTask);
    });
}


const openChild = (task) => {
    task.is_open = !task.is_open
}

const updateTask = async(task) => {
    await api.taskApi.updateTask(task.id, task, childrenSelectedTask.value);
}

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

const deleteTask = async(task) => {
    await api.taskApi.deleteTask(task.id).then(async() => {
        await fetchTask();
    }).catch((error) => {
        console.log('error =>', error)
        /*errorToast({
            text: error.data.message,
        });*/
    });
};

</script>

<style lang="scss" scoped>
.ev-checkbox-input {
    input[type=checkbox] {
        visibility: hidden;
        display: none;
    }
    &__check {
        position: relative;
        width: 1.75rem;
        height: 1.75rem;
        display: inline-block;
        border: 3px solid #4a4a4a;
        border-radius: 4px;
        vertical-align: middle;
        &::after {
            content: "";
            position: absolute;
            display: inline-block;
            top: 50%;
            left: 50%;
            width: 0.9rem;
            height: 0.9rem;
            transform: translateX(-50%) translateY(-50%);
            border-radius: 2px;
            background: transparent;
        }
    }
    &__name {
        display: flex;
        flex-direction: column;
        padding: 0 0 0 0.5rem;
        color: #4a4a4a;
    }
    input[type=checkbox]:checked+.ev-checkbox-input__check:after {
        background: #4a4a4a;
    }

    input[data-tristate="0"] {
        & + .ev-checkbox-input__check {
            &::after {
                background: none;
            }
        }
    }

    input[data-tristate="1"] {
        & + .ev-checkbox-input__check {
            &::after {
                border-top: 14px solid #4a4a4a;
                border-right: 14px solid transparent;
                border-radius: 0;
                background: none;
            }
        }
    }

    input[data-tristate="2"] {
        & + .ev-checkbox-input__check {
            &::after {
                background: #4a4a4a;
            }
        }
    }
}
</style>
