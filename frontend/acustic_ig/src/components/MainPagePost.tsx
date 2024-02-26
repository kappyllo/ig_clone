import { useState } from "react";

interface Props {
  op: { img: string; nickName: string };
  postTime: string;
  description: string;
  photo: string;
  likes: number;
  comments: { count: number; comms: string[] };
}

export default function MainPagePost({
  op,
  postTime,
  description,
  photo,
  likes,
  comments,
}: Props) {
  const [isClicked, setIsClicked] = useState(false);
  const [likeCount, setLikeCount] = useState(likes);

  function handleLikeClick() {
    setIsClicked((curr) => !curr);
    if (isClicked) {
      setLikeCount((curr) => curr - 1);
    } else {
      setLikeCount((curr) => curr + 1);
    }
  }

  return (
    <div className="mb-5 xl:mt-6">
      <div className="flex mb-2 items-center">
        <img
          className="rounded-full w-8 mr-2 sm:ml-1  "
          src={op.profile_pic}
          alt=""
        />
        <p className="mr-2 font-medium">{op.tag}</p>
        <p>{postTime}</p>
        <button className="ml-auto mr-2 text-3xl mb-5">...</button>
      </div>
      <img className="sm:w-screen sm:px-1" src={photo} alt="" />
      <div className="sm:ml-1">
        <div className="mt-3">
          <button className="mr-3" onClick={handleLikeClick}>
            {isClicked ? (
              <img src="like-clicked.svg" />
            ) : (
              <img src="like.svg" />
            )}
          </button>
          <button>
            <img src="comments.svg" alt="" />
          </button>
        </div>
        <p className="font-medium">Liczba polubień: {likeCount}</p>
        <p>
          <span className="font-medium">{op.tag} </span>
          {description}
        </p>
        <button>Zobacz wszystkie komentarze: {comments.count}</button>
      </div>
      <hr className="border-slate-800 mt-2" />
    </div>
  );
}
