export default function MobileUpperNavBar() {
  return (
    <div className="sm:flex justify-between hidden mx-5 mt-2">
      <h1 className="text-2xl font-bold">Dla Ciebie</h1>
      <div className="mt-2">
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
