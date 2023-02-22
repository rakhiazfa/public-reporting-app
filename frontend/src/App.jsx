import React, { useContext } from "react";
import { AuthContext } from "./providers/AuthProvider";
import Router from "./routing/Router";

function App() {
    const { pending } = useContext(AuthContext);

    return !pending ? (
        <Router />
    ) : (
        <div className="preloader">
            <div className="lds-ripple">
                <div></div>
                <div></div>
            </div>
        </div>
    );
}

export default App;
