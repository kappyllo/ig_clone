<?php

// Static files
$router->get("/uploads/{filename}", "FileController@getOne");

// Users
$router->get("/users", "UserController@getAll");
$router->get("/users/{id}", "UserController@getOne");
$router->get("/users/{id}/posts", "UserController@getPosts");
$router->get("/users/{id}/stories", "StoryController@getAllFromUser");
$router->get("/users/{id}/followers", "UserController@getFollowers");
$router->get("/users/{id}/followed", "UserController@getFollowed");
$router->get("/users/{id}/followed/posts", "PostController@getPostsFromFollowedUsers");

$router->delete("/users/{id}", "UserController@deleteOne");

// Posts
$router->get("/posts", "PostController@getAll");
$router->get("/posts/{id}", "PostController@getOne");
$router->get("/posts/{id}/likes", "PostLikeController@getLikes");
$router->get("/posts/{id}/likes/count", "PostLikeController@getLikeCount");
$router->post("/posts", "PostController@create");
$router->post("/posts/{id}/like", "PostLikeController@create", ["protect" => []]);
$router->post("/posts/{id}/comment", "CommentController@commentPost", ["protect" => []]);
$router->delete("/posts/{id}/like", "PostLikeController@dislike", ["protect" => []]);

// Follows
$router->get("/follows", "FollowController@getAll");
$router->post("/follows", "FollowController@create");

// Auth
$router->post("/register", "AuthController@register");
$router->post("/login", "AuthController@login");
$router->get("/logout", "AuthController@logout");

// Media
$router->get("/media/{id}", "MediaController@getOne");
$router->get("/media/{id}/file", "MediaController@getAssociatedFile");

// Post Likes
$router->get("/post_likes", "PostLikeController@getAll");
$router->get("/post_likes/{id}", "PostLikeController@getOne");
$router->post("/post_likes", "PostLikeController@create", ["protect" => [], "restrict" => [["mod", "admin"]]]);
$router->delete("/post_likes/{id}", "PostLikeController@deleteOne", ["protect" => [], "restrict" => [["mod", "admin"]]]);

// Comments
$router->get("/comments", "CommentController@getAll");
$router->get("/comments/{id}", "CommentController@getOne");
$router->post("/comments/{id}/reply", "CommentController@replyToComment", ["protect" => []]);
$router->post("/comments/{id}/like", "CommentLikeController@likeComment", ["protect" => []]);
$router->patch("/comments/{id}", "CommentController@editComment", ["protect" => []]);
$router->delete("/comments/{id}", "CommentController@removeComment", ["protect" => []]);

// Stories
$router->get("/stories", "StoryController@getAll");
$router->get("/stories/{id}", "StoryController@getOne");
$router->post("/stories", "StoryController@create", ["protect" => []]);
$router->post("/stories/{id}/view", "StoryViewController@create", ["protect" => []]);

// Story Views
$router->get("/story_views", "StoryViewController@getAll");
$router->get("/story_views/{id}", "StoryViewController@getOne");