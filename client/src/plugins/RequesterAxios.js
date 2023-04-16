import axios from "@/plugins/axios";

export default class RequesterAxios {
    async get(url, data) {
        try {
            const response = await axios.get(url, data);
            return response.data;
        } catch (error) {
            console.log("error =>", error);
            throw error;
        }
    }

    async patch(url, data) {
        try {
            const response = await axios.patch(url, data);
            return response.data;
        } catch (error) {
            console.log("error =>", error);
            throw error;
        }
    }

    async put(url, data) {
        try {
            const response = await axios.put(url, data);
            return response.data;
        } catch (error) {
            console.log("error =>", error);
            throw error;
        }
    }

    async post(url, data) {
        try {
            const response = await axios.post(url, data);
            return response.data;
        } catch (error) {
            console.log("error =>", error);
            throw error;
        }
    }

    async delete(url, data) {
        try {
            const response = await axios.delete(url, data);
            return response.data;
        } catch (error) {
            console.log("error =>", error);
            throw error;
        }
    }
}
