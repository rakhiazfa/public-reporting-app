import { createSlice } from "@reduxjs/toolkit";
import { getReportCategories } from "./reportCategoryActions";

const initialState = {
    errors: null,
    loading: false,
    reportCategories: null,
};

const reportCategorySlice = createSlice({
    name: "report-category",
    initialState,
    reducers: {
        clearErrors: (state, action) => {
            state.errors = null;
        },
    },
    extraReducers: (buider) => {
        // Get all report categories

        buider.addCase(getReportCategories.pending, (state, { payload }) => {
            state.loading = true;
        });

        buider.addCase(getReportCategories.rejected, (state, { payload }) => {
            state.loading = false;
        });

        buider.addCase(getReportCategories.fulfilled, (state, { payload }) => {
            state.reportCategories = payload.report_categories;
            state.loading = false;
        });
    },
});

export const { clearErrors } = reportCategorySlice.actions;

export default reportCategorySlice.reducer;