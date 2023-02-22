import React, { useState } from "react";
import Input from "../Fields/Input";

const SignInForm = ({ onSubmit }) => {
    const [data, setData] = useState({
        email_or_username: "",
        password: "",
    });

    const handleChange = (event) => {
        setData((old) => ({
            ...old,
            [event.target.name]: event.target.value,
        }));
    };

    const handleSubmit = (event) => {
        event.preventDefault();

        onSubmit && onSubmit(event, data);
    };

    return (
        <form onSubmit={handleSubmit}>
            <h1 className="text-[clamp(1.5rem,8vw,3rem)] font-bold max-w-[450px] mb-14">
                Login
            </h1>
            <div className="grid gap-7">
                <Input
                    type="text"
                    label="Email atau Username"
                    name="email_or_username"
                    value={data?.email_or_username}
                    onChange={handleChange}
                    placeholder="Masukan email atau username anda . . ."
                />
                <Input
                    type="password"
                    label="Password"
                    name="password"
                    value={data?.password}
                    onChange={handleChange}
                    placeholder="Masukan kata sandi anda . . ."
                />
                <div className="flex justify-end">
                    <button
                        type="submit"
                        className="button bg-blue-500 text-white"
                    >
                        Login
                    </button>
                </div>
            </div>
        </form>
    );
};

export default SignInForm;
