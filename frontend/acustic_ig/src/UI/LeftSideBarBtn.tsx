interface Props {
  icon: string;
  text: string;
}

export default function LeftSideBarBtn({ icon, text }: Props) {
  return (
    <button className="flex items-center mb-5 justify-center text-center">
      <img className="mr-3 pl-2" src={icon} alt="" />
      <p>{text}</p>
    </button>
  );
}
