interface Props {
  who: {
    img: string;
    name: string;
  };
  what: string;
  btn: string;
}

export default function NotificationElement({ who, what, btn }: Props) {
  return (
    <div className="flex justify-center align-middle pt-20">
      <div className="flex justify-center">
        <img src={who.img} alt="" className="rounded-full w-12   mr-2 ml-2" />
      </div>
      <div>
        <p className="font-semibold">{who.name}</p>
        <p>{what}</p>
      </div>
      {btn !== "none" ? (
        <button className=" bg-blue-400 text-white rounded h-7 w-24 my-auto ml-5">
          {btn}
        </button>
      ) : null}
    </div>
  );
}
