import { createSlice } from "@reduxjs/toolkit";

const initialState = {
    errors: null,
    loading: false,
    agencies: null,
};

const agencySlice = createSlice({
    name: "agency",
    initialState,
    reducers: {
        clearErrors: (state, action) => {
            state.errorMessage = null;
            state.errors = null;
        },
    },
    extraReducers: (buider) => {},
});

export const { clearErrors } = agencySlice.actions;

export default agencySlice.reducer;
