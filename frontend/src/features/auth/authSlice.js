import { createSlice } from "@reduxjs/toolkit";
import { getUser, login, logout } from "./authActions";

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
    extraReducers: (buider) => {
        // Login

        buider.addCase(login.pending, (state, { payload }) => {
            state.loading = true;
        });

        buider.addCase(login.rejected, (state, { payload }) => {
            state.errors = payload?.errors;
            state.loading = false;
        });

        buider.addCase(login.fulfilled, (state, { payload }) => {
            console.log(payload);

            localStorage.setItem("at", payload?.token);

            state.user = payload?.user;
            state.loading = false;
        });

        // Get user

        buider.addCase(getUser.pending, (state, { payload }) => {
            state.loading = true;
        });

        buider.addCase(getUser.rejected, (state, { payload }) => {
            state.errors = payload?.errors;
            state.loading = false;
        });

        buider.addCase(getUser.fulfilled, (state, { payload }) => {
            state.user = payload?.user;
            state.loading = false;
        });

        // Logout

        buider.addCase(logout.pending, (state, { payload }) => {
            state.loading = true;
        });

        buider.addCase(logout.rejected, (state, { payload }) => {
            state.errors = payload?.errors;
            state.loading = false;
        });

        buider.addCase(logout.fulfilled, (state, { payload }) => {
            state.user = payload?.user;
            state.loading = false;
        });
    },
});

export const { clearErrors } = authSlice.actions;

export default authSlice.reducer;
