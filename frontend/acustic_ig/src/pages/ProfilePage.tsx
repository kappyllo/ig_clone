import LeftSideBar from "../components/LeftSidebar";
import MobileNavBar from "../components/MobileNavBar";
import ProfilePhotos from "../components/ProfilePhotos";
import ProfileUpperSection from "../components/ProfileUpperSection";

export default function ProfilePage() {
  return (
    <>
      <LeftSideBar />
      <div className="xl:mx-1">
        <ProfileUpperSection />
        <ProfilePhotos />
      </div>
      <MobileNavBar />
    </>
  );
}
