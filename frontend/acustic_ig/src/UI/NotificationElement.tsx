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
    <div className="flex justify-center pt-20">
      <div>{who.img}</div>
      <div>
        {who.name} {what}
      </div>
      {btn !== "none" ? <button>{btn}</button> : null}
    </div>
  );
}
