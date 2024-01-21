import { createBrowserRouter, RouterProvider } from "react-router-dom";
import HomePage from "./pages/HomePage";
import LoginPage from "./pages/LoginPage";
import ProfilePage from "./pages/ProfilePage";

const router = createBrowserRouter([
  { path: "/", element: <HomePage /> },
  { path: "login", element: <LoginPage /> },
  { path: "/profile", element: <ProfilePage /> },
]);

function App() {
  return <RouterProvider router={router}></RouterProvider>;
}

export default App;
