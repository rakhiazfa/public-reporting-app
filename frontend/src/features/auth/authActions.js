/**
 * Auth actions.
 *
 */

import { createAsyncThunk } from "@reduxjs/toolkit";
import axios from "axios";

export const login = createAsyncThunk(
    "auth/login",
    async (payload, { rejectWithValue }) => {
        try {
            const { data } = await axios.post("/auth/login", payload);

            return data;
        } catch (error) {
            return rejectWithValue(error.response.data);
        }
    }
);
