import LeftSideBarBtn from "../UI/LeftSideBarBtn";

export default function LeftSideBar() {
  return (
    <>
      <div className="mt-5 left-10   h-screen fixed">
        <h1 className=" mb-16">Acusgram</h1>
        <div>
          <ul>
            <li className="mb-2">
              <LeftSideBarBtn text="Strona główna" icon="home.svg" />
            </li>
            <li className="mb-2">
              <LeftSideBarBtn text="Szukaj" icon="search.svg" />
            </li>
            <li className="mb-2">
              <LeftSideBarBtn text="Exploruj" icon="explore.svg" />
            </li>
            <li className="mb-2">
              <LeftSideBarBtn text="Rolki" icon="rolki.svg" />
            </li>
            <li className="mb-2">
              <LeftSideBarBtn text="Wiadomości" icon="messages.svg" />
            </li>
            <li className="mb-2">
              <LeftSideBarBtn text="Powiadomienia" icon="blank-hearth.svg" />
            </li>
            <li className="mb-2">
              <LeftSideBarBtn text="Utwórz" icon="create.svg" />
            </li>
            <li>
              <button className="flex items-center">
                <img
                  className="rounded-full w-5 mr-2"
                  src="cat-story.jpeg"
                  alt=""
                />
                <p>Profil</p>
              </button>
            </li>
          </ul>
        </div>
      </div>
      <div className="fixed ml-80  h-screen border-solid border-slate-700 border"></div>
    </>
  );
}
