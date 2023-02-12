import { createAsyncThunk } from "@reduxjs/toolkit";
import axios from "axios";
import axiosWithToken from "../../services/axiosWithToken";

/**
 * Category actions.
 *
 */

export const getReportCategories = createAsyncThunk(
    "categories",
    async (payload, { rejectWithValue }) => {
        try {
            const { data } = axios.get(
                "/report-categories?with-subcategories=true"
            );

            return data;
        } catch (error) {
            return rejectWithValue(error.response.data);
        }
    }
);
