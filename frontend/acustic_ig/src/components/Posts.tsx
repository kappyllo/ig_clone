import { useSelector } from "react-redux";
import MainPagePost from "./MainPagePost";
import { combineReducers } from "@reduxjs/toolkit";
const rootReducer = combineReducers({});
export type IRootState = ReturnType<typeof rootReducer>;

export default function Posts() {
  const ALL_POSTS = useSelector((state: IRootState) => state.homePosts);

  const comms = { count: 1, comms: ["test"] };
  return (
    <div className="flex flex-col justify-center mx-auto">
      {ALL_POSTS!.map((post: any) => {
        return (
          <MainPagePost
            op={post.user}
            postTime="12 godz."
            description={post.description}
            likes={2}
            comments={comms}
            photo={post.media_uri}
          />
        );
      })}
    </div>
  );
}

// naprawic wersje telefon.
