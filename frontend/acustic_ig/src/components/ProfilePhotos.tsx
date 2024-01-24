const EXAMPLE_POSTS = [
  { photo: "cat-story.jpeg" },
  { photo: "cat-story.jpeg" },
  { photo: "cat-story.jpeg" },
  { photo: "cat-story.jpeg" },
];

export default function ProfilePhotos() {
  return (
    <div className="flex justify-center mt-12">
      <ul className="grid gap-1 grid-cols-3">
        {EXAMPLE_POSTS.map((post) => {
          return (
            <li>
              <button>
                <img className="w-56" src={post.photo} alt="" />
              </button>
            </li>
          );
        })}
      </ul>
    </div>
  );
}
