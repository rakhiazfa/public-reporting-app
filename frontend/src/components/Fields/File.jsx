import React, { useRef, useState } from "react";

const File = ({
    label,
    name,
    value,
    onChange,
    placeholder,
    className,
    error,
    help,
}) => {
    const inputRef = useRef(null);

    const [selectedFile, setSelectedFile] = useState("");

    const handleChange = (event) => {
        const file = event.target.files[0];

        setSelectedFile(file.name);

        onChange && onChange(event, file);
    };

    const handleClick = () => {
        inputRef.current.click();
    };

    return (
        <div className={`${className} px-2`}>
            <label className="ml-1">{label}</label>
            <input
                ref={inputRef}
                className="hidden"
                type="file"
                name={name}
                value={value}
                onChange={handleChange}
                placeholder={placeholder}
            />
            <div
                className="flex items-center gap-x-5 border rounded-lg py-[0.535rem] cursor-pointer active:border-blue-400"
                onClick={handleClick}
            >
                <span className="px-5 border-r">Choose File</span>
                <p className="text-sm font-light">{selectedFile}</p>
            </div>
            <p className="mt-1 text-sm text-gray-500" id="file_input_help">
                {help ?? ""}
            </p>
            {error && (
                <p className="text-sm font-normal text-red-500 ml-1 mt-2 -mb-2">
                    {error}
                </p>
            )}
        </div>
    );
};

export default File;
