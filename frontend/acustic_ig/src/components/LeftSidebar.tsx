import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faHouse } from "@fortawesome/free-solid-svg-icons";

export default function LeftSideBar() {
  return (
    <div className="mt-5 left-10   h-screen fixed">
      <h1 className="mb-5">Acusgram</h1>
      <div>
        <ul>
          <li className="mb-2">
            <button>
              <FontAwesomeIcon icon={faHouse} />
              <p>Strona Główna</p>
            </button>
          </li>
          <li className="mb-2">
            <button>Szukaj</button>
          </li>
          <li className="mb-2">
            <button>Eksploruj</button>
          </li>
          <li className="mb-2">
            <button>Rolki</button>
          </li>
          <li className="mb-2">
            <button>Wiadomości</button>
          </li>
          <li className="mb-2">
            <button>Powiadomienia</button>
          </li>
          <li className="mb-2">
            <button>Utwórz</button>
          </li>
          <li>
            <button>
              <img
                className="rounded-full w-8 mr-2"
                src="cat-story.jpeg"
                alt=""
              />
              <p>Profil</p>
            </button>
          </li>
        </ul>
      </div>
      <div>
        <ul className="">
          <li>Threads</li>
          <li>Więcej</li>
        </ul>
      </div>
    </div>
  );
}
