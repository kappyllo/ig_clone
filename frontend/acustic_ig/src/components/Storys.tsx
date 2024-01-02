import StoryBtn from "../UI/StoryBtn";

const LI_MARGIN = "mx-3";
const EXAMPLE_STORIS = [
  { name: "Kacper", img: "cat-story.jpeg" },
  { name: "Marek", img: "cat-story.jpeg" },
  { name: "Pan_Tusk", img: "cat-story.jpeg" },
  { name: "Zabaw...", img: "cat-story.jpeg" },
  { name: "tururu", img: "cat-story.jpeg" },
  { name: "cing_cio...", img: "cat-story.jpeg" },
  { name: "rezi", img: "cat-story.jpeg" },
  { name: "user", img: "cat-story.jpeg" },
];

// const STORYS_THAT_SOMEDAY_WILL_BE_DYNAMIC = (
//   <ul className="flex flex-row  text-xs text-center mt-5 ">
//     {/* <li className={LI_MARGIN}>
//       <StoryBtn />
//     </li> */}

export default function Storys() {
  return (
    <>
      <ul className="flex flex-row  text-xs text-center mt-5 ">
        {EXAMPLE_STORIS.map((story) => {
          return (
            <li className={LI_MARGIN}>
              <StoryBtn nickName={story.name} img={story.img} />
            </li>
          );
        })}
      </ul>
    </>
  );
}
