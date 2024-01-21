import LeftSideBar from "../components/LeftSidebar";
import ProfilePhotos from "../components/ProfilePhotos";
import ProfileUpperSection from "../components/ProfileUpperSection";

export default function ProfilePage() {
  return (
    <>
      <LeftSideBar />
      <div>
        <ProfileUpperSection />
        <ProfilePhotos />
      </div>
    </>
  );
}
