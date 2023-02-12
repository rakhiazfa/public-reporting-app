import { configureStore } from "@reduxjs/toolkit";
import authReducer from "../features/auth/authSlice";
import reportCategoryReducer from "../features/report_category/reportCategorySlice";

const store = configureStore({
    reducer: {
        auth: authReducer,
        reportCategory: reportCategoryReducer,
    },
    middleware: (getDefaultMiddleware) =>
        getDefaultMiddleware({
            serializableCheck: false,
        }),
});

export default store;
