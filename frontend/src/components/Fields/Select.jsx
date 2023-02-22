import React from "react";
import ReactSelect from "react-select";

const Select = ({
    label,
    name,
    value,
    onChange,
    placeholder,
    className,
    error,
    options,
    disabled,
}) => {
    return (
        <div className={`${className} px-2`}>
            <label className="ml-1">{label}</label>
            <ReactSelect
                options={options}
                name={name}
                value={value}
                onChange={onChange}
                placeholder={placeholder}
                styles={{
                    control: (base) => ({
                        ...base,
                        height: "44.85px",
                        borderRadius: "0.5rem",
                        borderColor: "#cbd5e1",
                    }),
                }}
                isDisabled={disabled}
                isLoading={options?.length === 0}
            />
            {error && (
                <p className="text-sm font-normal text-red-500 ml-1 mt-2 -mb-2">
                    {error}
                </p>
            )}
        </div>
    );
};

export default Select;
