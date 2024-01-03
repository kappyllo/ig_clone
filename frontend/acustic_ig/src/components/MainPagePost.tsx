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
    <div className="mb-5">
      <div className="flex mb-2">
        <img className="rounded-full w-9    " src={op.img} alt="" />
        <p>{op.nickName}</p>
        <p>{postTime}</p>
        <button>...</button>
      </div>
      <img src={photo} alt="" />
      <div>
        <p>Liczba polubień: {likes}</p>
        <p>
          {op.nickName} {description}
        </p>
        <button>Zobacz wszystkie komentarze: {comments.count}</button>
      </div>
    </div>
  );
}
