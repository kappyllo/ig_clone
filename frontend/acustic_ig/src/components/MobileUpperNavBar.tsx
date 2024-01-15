export default function MobileUpperNavBar() {
  return (
    <div className="sm:flex justify-between hidden pt-2 px-5 z-10 fixed w-screen bg-white top-0 pb-1">
      <h1 className="text-2xl font-bold">Dla Ciebie</h1>
      <div className="mt-1">
        <button>
          <img className="mr-5" src="create-mobile.svg" alt="" />
        </button>
        <button>
          <img src="like.svg" alt="" />
        </button>
      </div>
    </div>
  );
}
