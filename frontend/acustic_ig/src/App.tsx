import Posts from "./components/Posts";
import RightSideBar from "./components/RightBar";
import Storys from "./components/Storys";
import LeftSideBar from "./components/LeftSidebar";

function App() {
  return (
    <>
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
    </>
  );
}

export default App;
