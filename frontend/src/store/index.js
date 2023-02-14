import { configureStore } from "@reduxjs/toolkit";
import agencyReducer from "../features/agency/agencySlice";
import authReducer from "../features/auth/authSlice";
import reportCategoryReducer from "../features/report_category/reportCategorySlice";

const store = configureStore({
    reducer: {
        auth: authReducer,
        reportCategory: reportCategoryReducer,
        agency: agencyReducer,
    },
    middleware: (getDefaultMiddleware) =>
        getDefaultMiddleware({
            serializableCheck: false,
        }),
});

export default store;
