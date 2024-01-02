import Posts from "./components/Posts";
import RightSideBar from "./components/RightBar";
import Storys from "./components/Storys";
import LeftSideBar from "./components/LeftSidebar";

function App() {
  return (
    <div className="flex justify-around">
      <LeftSideBar />
      <Storys />
      <Posts />
      <RightSideBar />
    </div>
  );
}

export default App;
