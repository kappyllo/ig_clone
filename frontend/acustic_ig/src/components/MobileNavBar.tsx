export default function MobileNavBar() {
  return (
    <ul className="xl:flex justify-evenly fixed items-center bg-white h-12 bottom-0 w-screen z-10 hidden">
      <li>
        <button>
          <img src="home.svg" alt="" />
        </button>
      </li>
      <li>
        <button>
          <img src="explore.svg" alt="" />
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
          <img className="rounded-full w-6 mr-2" src="cat-story.jpeg" alt="" />
        </button>
      </li>
    </ul>
  );
}

// Do zrobienia
