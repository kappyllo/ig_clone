import { Link } from "react-router-dom";

export default function LoginPage() {
  return (
    <div className="flex flex-col justify-center h-screen items-center">
      <h1 className="mb-5 text-3xl">𝒜𝒸𝓊𝓈𝓉𝒾𝒸𝑔𝓇𝒶𝓂</h1>
      <div className="flex flex-col">
        <input
          className="mb-2 w-64 border p-2"
          type="text"
          placeholder="Nickname"
          name=""
          id=""
        />
        <input
          className="mb-3 border p-2"
          type="password"
          placeholder="Password"
          name=""
          id=""
        />
        <button className="bg-blue-400 text-white rounded font-semibold p-1">
          <Link to={"/"}>Log in</Link> {/* // to change later */}
        </button>
        <p className="text-center mt-5 mb-5">
          ━━━━━━━━━━━━━━ OR ━━━━━━━━━━━━━━
        </p>
        <button className="text-blue-400 font-semibold">Register</button>
      </div>
    </div>
  );
}
