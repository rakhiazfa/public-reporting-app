import React from "react";

const Select = ({
    type,
    label,
    name,
    value,
    onChange,
    placeholder,
    className,
    error,
    options,
}) => {
    return (
        <div className={`${className}`}>
            <label className="ml-1">{label}</label>
            <select name={name} className="field">
                <option value="_DEFAULT_">{placeholder}</option>
                {options?.map((option, index) => (
                    <option key={index} value={option?.key}>
                        {option?.value}
                    </option>
                ))}
            </select>
            {error && (
                <p className="text-sm font-medium text-red-500 ml-1 mt-2 -mb-2">
                    {error}
                </p>
            )}
        </div>
    );
};

export default Select;
