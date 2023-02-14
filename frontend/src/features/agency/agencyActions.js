import { createAsyncThunk } from "@reduxjs/toolkit";
import axios from "axios";
import axiosWithToken from "../../services/axiosWithToken";

/**
 * Agency actions.
 *
 */

export const getAgencies = createAsyncThunk(
    "agencies",
    async (payload, { rejectWithValue }) => {
        try {
            const { data } = await axios.get("/agencies");

            return data;
        } catch (error) {
            return rejectWithValue(error.response.data);
        }
    }
);
