import { useAuthStore } from "@/stores";

export default async function requireAuth({ next }) {
    const { getCurrentUser } = useAuthStore();
    try {
        const currentUser = await getCurrentUser();
        console.log('currentUser =>', currentUser);
        if (!currentUser) {
            return next({
                name: "Login",
            });
        }
    } catch (error) {
        console.log('requireAuth =>', error);
        document.location.href = "/auth/login";
    }

    return next();
}
