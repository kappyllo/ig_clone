interface Props {
  nickName: string;
  img: string;
}

export default function StoryBtn({ nickName, img }: Props) {
  return (
    <button className="flex flex-col items-center justify-center">
      <img className="w-12 rounded-full" src={img} alt="profile picture" />
      <p>{nickName}</p>
    </button>
  );
}

// naprawic to
