import { defineStore } from "pinia";

const filtersStorageVersion = 1;
const taskStorageItemKey = `task_store_${filtersStorageVersion}`;

const defaultStoredTask = {
    tasks: [],
};
const serialiseTaskStore = (state) => {
    sessionStorage.setItem(
        taskStorageItemKey,
        JSON.stringify({
            tasks: state.tasks,
        })
    );
};

const deserializeTaskStore = () => {
    const storedTask = sessionStorage.getItem(taskStorageItemKey);
    return storedTask ? JSON.parse(storedTask) : defaultStoredTask;
};

const taskSeserialize = deserializeTaskStore();

export const useTaskStore = defineStore("task", {
    state: () => ({
        // initialize state from local storage to enable user to stay logged in
        tasks: taskSeserialize.tasks,
    }),
    actions: {
        async setTasks(tasks) {
            this.tasks = tasks;
            serialiseTaskStore(this);
        }
    },
});
