import { createSlice } from "@reduxjs/toolkit";

const initialState = {
    errors: null,
    loading: false,
    categories: null,
};

const categorySlice = createSlice({
    name: "category",
    initialState,
    reducers: {
        clearErrors: (state, action) => {
            state.errors = null;
        },
    },
    extraReducers: (buider) => {},
});

export const { clearErrors } = categorySlice.actions;

export default categorySlice.reducer;
