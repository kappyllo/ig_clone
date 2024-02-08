import NotificationElement from "../UI/NotificationElement";
import LeftSideBar from "../components/LeftSidebar";

const EXAMPLE_NOTIF = [
  {
    who: { name: "Profile1", img: "cat-story.jpeg" },
    what: "Zaobserwował Cię",
    btn: "Obserwuj",
  },
];

export default function NotificationPage() {
  return (
    <>
      <LeftSideBar />
      <div>
        {EXAMPLE_NOTIF.map((notif) => (
          <NotificationElement
            who={notif.who}
            what={notif.what}
            btn={notif.btn}
          />
        ))}
      </div>
    </>
  );
}
