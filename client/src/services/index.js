import RequesterAxios from "@/plugins/RequesterAxios";
import auth from "@/services/auth";
import task from "@/services/task";

export default class Api {
    constructor() {
        this.requester = new RequesterAxios();
        this.authApi = new auth(this.requester);
        this.taskApi = new task(this.requester);
    }
}
