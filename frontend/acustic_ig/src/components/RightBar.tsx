const LOGGED_ACOUNT = "admin";
const ACOUNT_DESC = "opisik";
export default function RightSideBar() {
  return (
    <>
      <div>
        <div>
          <p>
            <img src="" alt="" />
            <p>{LOGGED_ACOUNT}</p>
            <p>{ACOUNT_DESC}</p>
          </p>
          <button>Przęłącz</button>
        </div>
        <div>
          <p>Propozycje dla Ciebie</p>
          <p>
            <img src="" alt="" />
            <p>{LOGGED_ACOUNT}</p>
            <p>{ACOUNT_DESC}</p>
          </p>
          <p>
            <img src="" alt="" />
            <p>{LOGGED_ACOUNT}</p>
            <p>{ACOUNT_DESC}</p>
          </p>
          <p>
            <img src="" alt="" />
            <p>{LOGGED_ACOUNT}</p>
            <p>{ACOUNT_DESC}</p>
          </p>
        </div>
      </div>
    </>
  );
}
