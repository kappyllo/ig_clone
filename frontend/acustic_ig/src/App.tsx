import { createBrowserRouter, RouterProvider } from "react-router-dom";
import HomePage from "./pages/HomePage";
import LoginPage from "./pages/LoginPage";
import ProfilePage from "./pages/ProfilePage";
import NotificationPage from "./pages/NotificationPage";

const router = createBrowserRouter([
  { path: "/", element: <HomePage /> },
  { path: "login", element: <LoginPage /> },
  { path: "/profile", element: <ProfilePage /> },
  { path: "/notifications", element: <NotificationPage /> },
]);

function App() {
  return <RouterProvider router={router}></RouterProvider>;
}

export default App;
