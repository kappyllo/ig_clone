import { Link } from "react-router-dom";

const LOGGED_ACOUNT = "admin";
const ACOUNT_DESC = "opisik";
export default function RightSideBar() {
  return (
    <div className="ml-auto mr-20 xl:hidden">
      <div className="flex justify-around items-center">
        <img src="cat-story.jpeg" className="rounded-full w-10 mr-2" alt="" />
        <div className="flex flex-col mr-20">
          <p className="font-semibold">{LOGGED_ACOUNT}</p>
          <p className="text-sm">{ACOUNT_DESC}</p>
        </div>
        <button className="text-blue-700 font-semibold text-sm">
          <Link to={"/login"}>Przełącz</Link>
        </button>
      </div>
    </div>
  );
}
