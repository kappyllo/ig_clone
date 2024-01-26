interface Props {
  image: string;
  likes: number;
  comments: number;
}

export default function ProfilePhotoElement({ image, likes, comments }: Props) {
  return (
    <div className="group">
      <img className="w-56 hover:brightness-75" src={image} alt="" />
      <div className="relative z-0 justify-center hidden group-hover:flex">
        <div className="absolute z-20 bottom-16">
          <img src="likes-profile.svg" alt="" />
          <p>{likes}</p>
          <img src="comments-profile.svg" alt="" />
          <p>{comments} </p>
        </div>
      </div>
    </div>
  );
}
