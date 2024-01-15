import Posts from "./components/Posts";
import RightSideBar from "./components/RightBar";
import Storys from "./components/Storys";
import LeftSideBar from "./components/LeftSidebar";
import MobileNavBar from "./components/MobileNavBar";
import MobileUpperNavBar from "./components/MobileUpperNavBar";

function App() {
  return (
    <>
      <MobileUpperNavBar />
      <LeftSideBar />
      <div className="flex justify-center ">
        <Storys />
      </div>
      <div className="flex">
        <RightSideBar />
      </div>
      <div className="flex">
        <Posts />
      </div>
      <MobileNavBar />
    </>
  );
}

export default App;
