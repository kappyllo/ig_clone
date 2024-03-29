const EXAMPLE_PROFILE = {
  nickName: "admin",
  profilePicture: "cat-story.jpeg",
  description: "example desc.",
  posts: {
    count: 15,
    photos: [],
  },
  followers: 4,
  following: 8,
};

const INFO_STYLE = "";
const FONT_BOLD = "font-semibold";

// ogarnac zeby photo bylo na roznych skokach inne a nie tylko jeden skok. I odstepy tak samo.

export default function ProfileUpperSection() {
  return (
    <div className="flex justify-center pt-10">
      <img
        src={EXAMPLE_PROFILE.profilePicture}
        className="rounded-full w-36 mr-20 xl:mr-0 xl:w-24 xl:h-24"
        alt=""
      />
      <div className="xl:ml-2">
        <div className="flex justify-between mb-5">
          <p className="text-xl">{EXAMPLE_PROFILE.nickName}</p>
          <button>
            <img src="settings.svg" alt="" />
          </button>
        </div>
        <div className="flex justify-between w-72 xl:w-64">
          <p className={INFO_STYLE}>
            Posts:{" "}
            <span className={FONT_BOLD}>{EXAMPLE_PROFILE.posts.count}</span>
          </p>
          <p className={INFO_STYLE}>
            <span className={FONT_BOLD}>{EXAMPLE_PROFILE.followers}</span>{" "}
            followers
          </p>
          <p className={INFO_STYLE}>
            Following:{" "}
            <span className={FONT_BOLD}>{EXAMPLE_PROFILE.following}</span>
          </p>
        </div>
        <div className="mt-5">
          <p>{EXAMPLE_PROFILE.description}</p>
        </div>
      </div>
    </div>
  );
}
