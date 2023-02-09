import { createSlice } from "@reduxjs/toolkit";

const initialState = {
    errors: null,
    loading: false,
    user: false,
};

const authSlice = createSlice({
    name: "auth",
    initialState,
    reducers: {
        clearErrors: (state, action) => {
            state.errors = null;
        },
    },
});

export const { clearErrors } = authSlice.actions;

export default authSlice.reducer;
