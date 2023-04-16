import { defineStore } from "pinia";

const filtersStorageVersion = 1;
const userStorageItemKey = `user_store_${filtersStorageVersion}`;

const defaultStoredUser = {
    user: null,
};
const serialiseUserStore = (state) => {
    sessionStorage.setItem(
        userStorageItemKey,
        JSON.stringify({
            user: state.user,
        })
    );
};

const deserializeUserStore = () => {
    const storedUser = sessionStorage.getItem(userStorageItemKey);
    return storedUser ? JSON.parse(storedUser) : defaultStoredUser;
};

const userSeserialize = deserializeUserStore();

export const useAuthStore = defineStore("auth", {
    state: () => ({
        // initialize state from local storage to enable user to stay logged in
        user: userSeserialize.user,
    }),
    actions: {
        async setUser(user) {
            // store user details and jwt in local storage to keep user logged in between page refreshes
            this.user = user;
            serialiseUserStore(this);
        },
        async deleteSession() {
            this.user = null;
            serialiseUserStore(this);
        },
        async getCurrentUser() {
            return this.user;
        },
    },
});
