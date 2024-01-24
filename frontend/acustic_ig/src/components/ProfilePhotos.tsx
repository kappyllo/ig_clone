import ProfilePhotoElement from "../UI/ProfilePhotoElement";

const EXAMPLE_POSTS = [
  { photo: "cat-story.jpeg", likes: 2, comments: 1 },
  { photo: "cat-story.jpeg", likes: 6, comments: 0 },
  { photo: "cat-story.jpeg", likes: 12, comments: 12 },
  { photo: "cat-story.jpeg", likes: 1, comments: 4 },
];

export default function ProfilePhotos() {
  return (
    <div className="flex justify-center mt-12">
      <ul className="grid gap-1 grid-cols-3">
        {EXAMPLE_POSTS.map((post) => {
          return (
            <li>
              <button>
                <ProfilePhotoElement
                  image={post.photo}
                  likes={post.likes}
                  comments={post.comments}
                />
              </button>
            </li>
          );
        })}
      </ul>
    </div>
  );
}
