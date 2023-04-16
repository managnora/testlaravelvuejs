export default class task {
    constructor(axios) {
        this.axios = axios;
    }

    getTasks = () => {
        return this.axios.get("tasks");
    };

    saveTask = (task) => {
        return this.axios.post("tasks", task);
    };

    updateTask = (taskId, task, childrenSelectedTask = null) => {
        return this.axios.put(`tasks/${taskId}`, {
            task,
            childrenSelectedTask
        });
    };

    deleteTask = (taskId) => {
        return this.axios.delete(`tasks/${taskId}`);
    };
}
