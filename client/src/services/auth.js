export default class auth {
    constructor(axios) {
        this.axios = axios;
    }

    signUpUser = (user) => {
        return this.axios.post("register", user);
    };

    loginUser = (user) => {
        return this.axios.post("login", user);
    };

    logoutUser = async () => {
        return this.axios.post("logout");
    };

    getMe = () => {
        return this.axios.get("get-user");
    };
}
