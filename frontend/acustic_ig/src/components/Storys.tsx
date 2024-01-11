import StoryBtn from "../UI/StoryBtn";
import { useRef } from "react";

const LI_MARGIN = "mx-3";
const EXAMPLE_STORIS = [
  { name: "Kacper", img: "cat-story.jpeg" },
  { name: "Marek", img: "cat-story.jpeg" },
  { name: "Pan_Tusk", img: "cat-story.jpeg" },
  { name: "Zabaw...", img: "cat-story.jpeg" },
  { name: "tururu", img: "cat-story.jpeg" },
  { name: "cing_cio...", img: "cat-story.jpeg" },
  { name: "rezi", img: "cat-story.jpeg" },
  // { name: "user", img: "cat-story.jpeg" },
];

export default function Storys() {
  const windowSize = useRef([window.innerWidth, window.innerHeight]);
  console.log(windowSize);
  return (
    <>
      <ul className="flex flex-row text-xs text-center mt-5 sm:mx-0 sm:w-11/12 overflow-x-auto ">
        {EXAMPLE_STORIS.map((story) => {
          return (
            <li className={LI_MARGIN} key={story.name}>
              <StoryBtn nickName={story.name} img={story.img} />
            </li>
          );
        })}
      </ul>
    </>
  );
}
