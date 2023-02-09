import React from "react";
import Datepicker from "react-tailwindcss-datepicker";

const Date = ({
    label,
    value,
    onChange,
    placeholder,
    asSingle,
    className,
    error,
    ...rest
}) => {
    return (
        <div className={`${className}`}>
            <label className="ml-1">{label}</label>
            <Datepicker
                asSingle={asSingle ?? true}
                value={value}
                onChange={onChange}
                inputClassName="border"
                placeholder={placeholder}
                {...rest}
            />
            {error && (
                <p className="text-sm font-medium text-red-500 ml-1 mt-2 -mb-2">
                    {error}
                </p>
            )}
        </div>
    );
};

export default Date;
