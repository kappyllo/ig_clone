interface Props {
  nickName: string;
  img: string;
}

export default function StoryBtn({ nickName, img }: Props) {
  return (
    <button>
      <img className="w-12 rounded-full" src={img} alt="profile picture" />
      <p>{nickName}</p>
    </button>
  );
}
