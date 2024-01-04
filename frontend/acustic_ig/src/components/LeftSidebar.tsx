export default function LeftSideBar() {
  return (
    <div className="mt-5 left-10   h-screen fixed">
      <h1 className="mb-5">Acusgram</h1>
      <div>
        <ul>
          <li className="mb-2">
            <button>
              <img src="home.svg" alt="" />
              <p>Strona Główna</p>
            </button>
          </li>
          <li className="mb-2">
            <button>
              <img src="search.svg" alt="" />
              <p>Szukaj</p>
            </button>
          </li>
          <li className="mb-2">
            <button>
              <img src="explore.svg" alt="" /> <p>Exploruj</p>
            </button>
          </li>
          <li className="mb-2">
            <button>
              <img src="rolki.svg" alt="" />
              <p>Rolki</p>
            </button>
          </li>
          <li className="mb-2">
            <button>
              <img src="messages.svg" alt="" />
              <p>Wiadomości</p>
            </button>
          </li>
          <li className="mb-2">
            <button>
              <img src="blank-hearth.svg" alt="" />
              <p>Powiadomienia</p>
            </button>
          </li>
          <li className="mb-2">
            <button>
              <img src="create.svg" alt="" />
              <p>Utwórz</p>
            </button>
          </li>
          <li>
            <button>
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
  );
}
