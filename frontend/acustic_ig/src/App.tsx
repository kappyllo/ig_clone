import Posts from "./components/Posts";
import RightSideBar from "./components/RightBar";
import Storys from "./components/Storys";
import LeftSideBar from "./components/leftSidebar";

function App() {
  return (
    <>
      <LeftSideBar />
      <Storys />
      <Posts />
      <RightSideBar />
    </>
  );
}

export default App;
