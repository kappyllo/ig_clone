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
  return (
    <div className="mb-5 xl:mt-6">
      <div className="flex mb-2 items-center">
        <img className="rounded-full w-8 mr-2 sm:ml-1  " src={op.img} alt="" />
        <p className="mr-2 font-medium">{op.nickName}</p>
        <p>{postTime}</p>
        <button className="ml-auto">...</button>
      </div>
      <img className="sm:w-screen sm:px-1" src={photo} alt="" />
      <div className="sm:ml-1">
        <div className="mt-3">
          <button className="mr-3">
            <img src="blank-hearth.svg" alt="" />
          </button>
          <button>
            <img src="messages.svg" alt="" />
          </button>
        </div>
        <p className="font-mediu">Liczba polubień: {likes}</p>
        <p>
          <span className="font-medium">{op.nickName} </span>
          {description}
        </p>
        <button>Zobacz wszystkie komentarze: {comments.count}</button>
      </div>
      <hr className="border-slate-800 mt-2" />
    </div>
  );
}
