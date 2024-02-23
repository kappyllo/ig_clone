<?php /** @noinspection ALL */

namespace App\Controllers;

use Framework\Database;
use App\Models\Post;
use Framework\Session;

class PostController extends Controller {
  protected $db;
  protected $postModel;

  public function __construct() {
    parent::__construct(new Post());
  }

//  public function getOne($params) {
//    $query = "
//      SELECT posts.id, posts.description, posts.created_at, posts.updated_at,
//             json_build_array(array_agg(uri)) AS media
//      FROM posts
//        JOIN media
//            ON media.id = ANY(posts.media_ids::int[])
//      WHERE posts.id = :id
//      GROUP BY posts.id
//    ";
//
//    $result = $this->db->query($query, $params)->fetch();
//
//    if (!$result) ErrorController::notFound();
//
//    sendResponse('', 200, $result);
//  }

  public function create() {
    $this->model->create();

    sendResponse("Post created successfully.", 201);
  }

  public function getPostsFromFollowedUsers($params) {
    $userId = $params['id'];

    $posts = $this->postModel->getAllFromFollowedUsers($userId);

    sendResponse('', 200, $posts);
  }
}