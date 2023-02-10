import React, { useEffect, useState } from "react";
import { useDispatch } from "react-redux";
import { getUser } from "./features/auth/authActions";
import Router from "./router";

function App() {
    const [pending, setPending] = useState(true);

    const dispatch = useDispatch();

    useEffect(() => {
        return () => {
            dispatch(getUser()).then(() => setPending(false));
        };
    }, [dispatch]);

    return !pending && <Router />;
}

export default App;
