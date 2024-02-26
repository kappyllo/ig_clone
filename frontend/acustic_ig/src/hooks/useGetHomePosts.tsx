import { useSelector } from "react-redux";
import { useState } from "react";
import { useEffect } from "react";
import { combineReducers } from "@reduxjs/toolkit";
const rootReducer = combineReducers({});
export type IRootState = ReturnType<typeof rootReducer>;

const API_URL = import.meta.env.VITE_API_URL;

export default function useGetHomePosts() {
  const user = useSelector((state: IRootState) => state.user);
  //   const userId = user.id;

  const [data, setData] = useState();

  async function fetchData() {
    const response = await fetch(`${API_URL}posts?page=3`, {
      method: "GET",
      //   credentials: "include",
    });
    const data = await response.json();
    const posts = await data.data;
    setData(posts);
  }
  useEffect(() => {
    fetchData();
  }, []);

  return data;
}

// `${API_URL}users/${userId}/followed/posts`
