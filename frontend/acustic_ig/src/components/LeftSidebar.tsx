import LeftSideBarBtn from "../UI/LeftSideBarBtn";

const LI_CLASSES =
  "mb-2 hover:bg-slate-200 duration-500 pr-28 rounded py-3 h-10 pb-9";

export default function LeftSideBar() {
  return (
    <>
      <div className="mt-5 left-10 h-screen fixed xl:hidden">
        <h1 className=" mb-16 pl-2">Acusgram</h1>
        <div>
          <ul>
            <li className={LI_CLASSES}>
              <LeftSideBarBtn text="Strona główna" icon="home.svg" />
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
              <LeftSideBarBtn text="Powiadomienia" icon="blank-hearth.svg" />
            </li>
            <li className={LI_CLASSES}>
              <LeftSideBarBtn text="Utwórz" icon="create.svg" />
            </li>
            <li>
              <button className="flex items-center">
                <img
                  className="rounded-full w-5 mr-2 ml-2 "
                  src="cat-story.jpeg"
                  alt=""
                />
                <p>Profil</p>
              </button>
            </li>
          </ul>
        </div>
      </div>
      <div className="fixed ml-80  h-screen border-solid border-slate-700 border xl:hidden"></div>
    </>
  );
}
