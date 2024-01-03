const LOGGED_ACOUNT = "admin";
const ACOUNT_DESC = "opisik";
export default function RightSideBar() {
  return (
    <div className="ml-auto mr-5">
      <div>
        <div>
          <img src="" alt="" />
          <p>{LOGGED_ACOUNT}</p>
          <p>{ACOUNT_DESC}</p>
        </div>
        <button>Przęłącz</button>
      </div>
    </div>
  );
}
