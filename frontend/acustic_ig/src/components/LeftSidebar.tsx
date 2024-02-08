import LeftSideBarBtn from "../UI/LeftSideBarBtn";
import { Link } from "react-router-dom";

const LI_CLASSES =
  "mb-2 hover:bg-slate-200 duration-500 rounded py-3 h-10 pb-9";

export default function LeftSideBar() {
  return (
    <>
      <div className="mt-5 left-10 h-screen fixed xl:hidden top-0">
        <h1 className="mb-12 mt-5 pl-2 text-xl">
          <button onClick={() => window.scrollTo(0, 0)}>𝒜𝒸𝓊𝓈𝓉𝒾𝒸𝑔𝓇𝒶𝓂</button>
        </h1>
        <div>
          <ul>
            <li className={LI_CLASSES}>
              <Link to="/">
                <LeftSideBarBtn text="Strona główna" icon="home.svg" />
              </Link>
            </li>
            <li className={LI_CLASSES}>
              <LeftSideBarBtn text="Szukaj" icon="search.svg" />
            </li>
            <li className={LI_CLASSES}>
              <LeftSideBarBtn text="Exploruj" icon="explore.svg" />
            </li>
            <li className={LI_CLASSES}>
              <LeftSideBarBtn text="Rolki" icon="rolki.svg" />
            </li>
            <li className={LI_CLASSES}>
              <LeftSideBarBtn text="Wiadomości" icon="messages.svg" />
            </li>
            <li className={LI_CLASSES}>
              <Link to="/notifications">
                <LeftSideBarBtn text="Powiadomienia" icon="like.svg" />
              </Link>
            </li>
            <li className={LI_CLASSES}>
              <LeftSideBarBtn text="Utwórz" icon="create-mobile.svg" />
            </li>
            <li className={LI_CLASSES}>
              <Link to="/profile">
                <button className="flex items-center ">
                  <img
                    className="rounded-full w-6 mr-2 ml-2 "
                    src="cat-story.jpeg"
                    alt=""
                  />
                  <p>Profil</p>
                </button>
              </Link>
            </li>
          </ul>
        </div>
      </div>
      <div className="fixed ml-80  h-screen border-solid border-slate-700 border xl:hidden"></div>
    </>
  );
}
