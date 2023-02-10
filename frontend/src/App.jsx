import React, { useEffect, useState } from "react";
import { useDispatch } from "react-redux";
import PageLoader from "./components/Loaders/PageLoader";
import { getUser } from "./features/auth/authActions";
import Router from "./router";

function App() {
    const [pending, setPending] = useState(true);

    const dispatch = useDispatch();

    useEffect(() => {
        return () => {
            dispatch(getUser()).then(() =>
                setTimeout(() => setPending(false), 2000)
            );
        };
    }, [dispatch]);

    return !pending ? <Router /> : <PageLoader />;
}

export default App;
