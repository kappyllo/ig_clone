import { useState } from "react";
import { useNavigate } from "react-router-dom";
import { useDispatch } from "react-redux";

const API_URL = import.meta.env.VITE_API_URL;

export default function useLogin() {
  const dispatch = useDispatch();
  function loginDispatch(userName: string) {
    dispatch({ type: "login", payload: userName });
  }

  const [data, setData] = useState("t");
  const navigate = useNavigate();

  function request(login: string, password: string) {
    async function fetchData() {
      const response = await fetch(API_URL, {
        body: JSON.stringify({
          email: login,
          password: password,
        }),
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        credentials: "include",
      });
      const data = await response.json();
      console.log(data);

      if (data.status === "success") {
        const cookie = response.headers.get("set-cookie");
        console.log(cookie);
        // loginDispatch(login);
        // navigate("/");
      } else {
        setData("Error");
      }
    }
    fetchData();
  }

  return [request, data] as const;
}
