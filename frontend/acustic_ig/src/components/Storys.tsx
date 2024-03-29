import StoryBtn from "../UI/StoryBtn";
import { useRef } from "react";

const LI_MARGIN = "mx-3 sm:w-96 sm:text-base";
const EXAMPLE_STORIS = [
  { name: "Kacper", img: "cat-story.jpeg" },
  { name: "Marek", img: "cat-story.jpeg" },
  { name: "Pan_Tusk", img: "cat-story.jpeg" },
  { name: "Zabaw...", img: "cat-story.jpeg" },
  { name: "tururu", img: "cat-story.jpeg" },
  { name: "cing_ci.", img: "cat-story.jpeg" },
  { name: "rezi", img: "cat-story.jpeg" },
  // { name: "Pan_Tusk", img: "cat-story.jpeg" },
  // { name: "Zabaw...", img: "cat-story.jpeg" },
  // { name: "tururu", img: "cat-story.jpeg" },
  // { name: "user", img: "cat-story.jpeg" },
];

export default function Storys() {
  const windowSize = useRef([window.innerWidth, window.innerHeight]);

  return (
    <>
      <ul className="flex flex-row text-xs text-center mt-14 sm:mx-0 sm:w-11/12 overflow-x-auto">
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
