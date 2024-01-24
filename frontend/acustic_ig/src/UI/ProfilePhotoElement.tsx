interface Props {
  image: string;
  likes: number;
  comments: number;
}

export default function ProfilePhotoElement({ image, likes, comments }: Props) {
  return (
    <div>
      <img className="w-56 hover:brightness-75" src={image} alt="" />
      <div className="relative z-0 hidden">
        // hidden do usuniecia ^
        <div className="absolute top-20 z-20">
          <img src="like.svg" alt="" />
          <p>{likes}</p>
          <img src="comments.svg" alt="" />
          <p>{comments} </p>
        </div>
      </div>
    </div>
  );
}

// trzeba ikony nowe zrobic z bialym tlem.
