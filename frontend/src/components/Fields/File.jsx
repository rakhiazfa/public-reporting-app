import React from "react";

const File = ({
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
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none"
                aria-describedby="file_input_help"
                id="file_input"
                type="file"
                name={name}
                value={value}
                onChange={onChange}
                placeholder={placeholder}
            />
            <p class="mt-1 text-sm text-gray-500" id="file_input_help">
                SVG, PNG, JPG or GIF (MAX. 800x400px).
            </p>
            {error && (
                <p className="text-sm font-medium text-red-500 ml-1 mt-2 -mb-2">
                    {error}
                </p>
            )}
        </div>
    );
};

export default File;
