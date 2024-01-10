import MainPagePost from "./MainPagePost";

const EXAMPLE_POSTS = [
  {
    op: { nickName: "Kacper", img: "cat-story.jpeg" },
    postTime: "12 godz.",
    description: "ciekawy opis",
    likes: 2,
    comments: { count: 1, comms: ["test"] },
    photo: "src/imgs/post_img.jpg",
  },
  {
    op: { nickName: "Kacper", img: "cat-story.jpeg" },
    postTime: "12 godz.",
    description: "ciekawy opis",
    likes: 2,
    comments: { count: 1, comms: ["test"] },
    photo: "src/imgs/post_img.jpg",
  },
  {
    op: { nickName: "Kacper", img: "cat-story.jpeg" },
    postTime: "12 godz.",
    description: "ciekawy opis",
    likes: 2,
    comments: { count: 1, comms: ["test"] },
    photo: "src/imgs/post_img.jpg",
  },
];

export default function Posts() {
  return (
    <div className="flex flex-col justify-center mx-auto">
      {EXAMPLE_POSTS.map((post) => {
        return (
          <MainPagePost
            op={post.op}
            postTime={post.postTime}
            description={post.description}
            likes={post.likes}
            comments={post.comments}
            photo={post.photo}
          />
        );
      })}
    </div>
  );
}

// naprawic wersje telefon.
