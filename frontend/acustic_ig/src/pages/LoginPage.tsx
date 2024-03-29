import { act } from "react-dom/test-utils";
import useGetHomePosts from "../hooks/useGetHomePosts";
import useLogin from "../hooks/useLogin";
import { useRef } from "react";
import { UseDispatch, useDispatch } from "react-redux";

export default function LoginPage() {
  const loginRef = useRef<HTMLInputElement>(null);
  const pwdRef = useRef<HTMLInputElement>(null);
  const dispatch = useDispatch();

  const [requestFn, data] = useLogin();

  const [allPosts, isLoading] = useGetHomePosts();

  function handleLogin() {
    const login = loginRef.current?.value;
    const pwd = pwdRef.current?.value;
    handleGetPosts();
    requestFn(login!, pwd!);
  }

  function handleGetPosts() {
    if (isLoading == false) {
      dispatch({ type: "getPosts", payload: allPosts });
    }
  }

  return (
    <div className="flex flex-col justify-center h-screen items-center">
      <h1 className="mb-5 text-3xl">𝒜𝒸𝓊𝓈𝓉𝒾𝒸𝑔𝓇𝒶𝓂</h1>
      <div className="flex flex-col">
        <input
          className="mb-2 w-64 border p-2"
          type="text"
          placeholder="Nickname"
          ref={loginRef}
        />
        <input
          className="mb-3 border p-2"
          type="password"
          placeholder="Password"
          ref={pwdRef}
        />
        <button
          onClick={handleLogin}
          className="bg-blue-400 text-white rounded font-semibold p-1"
        >
          Log in
        </button>
        <p className="text-center mt-5 mb-5">
          ━━━━━━━━━━━━━━ OR ━━━━━━━━━━━━━━
        </p>
        <button className="text-blue-400 font-semibold">Register</button>
      </div>
    </div>
  );
}
