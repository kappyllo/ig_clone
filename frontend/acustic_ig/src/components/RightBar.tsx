const LOGGED_ACOUNT = "admin";
const ACOUNT_DESC = "opisik";
export default function RightSideBar() {
  return (
    <>
      <div>
        <div>
          <div>
            <img src="" alt="" />
            <p>{LOGGED_ACOUNT}</p>
            <p>{ACOUNT_DESC}</p>
          </div>
          <button>Przęłącz</button>
        </div>
        <div>
          <p>Propozycje dla Ciebie</p>
          <div>
            <img src="" alt="" />
            <p>{LOGGED_ACOUNT}</p>
            <p>{ACOUNT_DESC}</p>
          </div>
          <div>
            <img src="" alt="" />
            <p>{LOGGED_ACOUNT}</p>
            <p>{ACOUNT_DESC}</p>
          </div>
          <div>
            <img src="" alt="" />
            <p>{LOGGED_ACOUNT}</p>
            <p>{ACOUNT_DESC}</p>
          </div>
        </div>
      </div>
    </>
  );
}
