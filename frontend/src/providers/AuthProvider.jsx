import axios from "axios";
import { createContext, useEffect, useState } from "react";

export const AuthContext = createContext();

export default function AuthProvider({ children }) {
    const [user, setUser] = useState(null);

    const getUser = async () => {
        try {
            const { data } = await axios.get("/user");

            setUser(data?.user);
        } catch (_) {}
    };

    useEffect(() => {
        getUser();
    }, []);

    const values = {
        user,
        setUser,
    };

    return (
        <AuthContext.Provider value={values}>{children}</AuthContext.Provider>
    );
}
