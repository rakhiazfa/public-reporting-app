import { createSlice } from "@reduxjs/toolkit";
import { getAgencies } from "./agencyActions";

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
    extraReducers: (buider) => {
        // Get agencies

        buider.addCase(getAgencies.pending, (state, { payload }) => {
            state.loading = true;
        });

        buider.addCase(getAgencies.rejected, (state, { payload }) => {
            state.loading = false;
        });

        buider.addCase(getAgencies.fulfilled, (state, { payload }) => {
            state.agencies = payload?.agencies;
            state.loading = false;
        });
    },
});

export const { clearErrors } = agencySlice.actions;

export default agencySlice.reducer;
