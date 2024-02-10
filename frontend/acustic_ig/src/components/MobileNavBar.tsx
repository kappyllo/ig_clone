import { Link } from "react-router-dom";

export default function MobileNavBar() {
  return (
    <ul className="xl:flex justify-evenly fixed items-center bg-white h-12 bottom-0 w-screen z-10 hidden">
      <li>
        <button>
          <Link to={"/"}>
            <img src="home.svg" alt="" />
          </Link>
        </button>
      </li>
      <li>
        <button>
          <Link to={"/notifications"}>
            <img src="like.svg" alt="" />
          </Link>
        </button>
      </li>
      <li>
        <button>
          <img src="rolki.svg" alt="" />
        </button>
      </li>
      <li>
        <button>
          <img src="messages.svg" alt="" />
        </button>
      </li>
      <li>
        <button>
          <Link to={"/profile"}>
            <img
              className="rounded-full w-6 mr-2"
              src="cat-story.jpeg"
              alt=""
            />
          </Link>
        </button>
      </li>
    </ul>
  );
}

// Do zrobienia
