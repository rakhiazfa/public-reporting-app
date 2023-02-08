import React from "react";

const Input = ({
    type,
    label,
    name,
    value,
    onChange,
    placeholder,
    className,
    error,
}) => {
    return (
        <div className={`${className}`}>
            <label className="ml-1">{label}</label>
            <input
                type={type ?? "text"}
                className="field"
                name={name}
                value={value}
                onChange={onChange}
                placeholder={placeholder}
            />
            {error && (
                <p className="text-sm text-red-500 ml-1 mt-2 -mb-2">{error}</p>
            )}
        </div>
    );
};

export default Input;
