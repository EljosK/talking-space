<?php
require('core/init.php');

$topic = new Topic();

//Get Category From URL
$category = isset($_GET['category']) ? $_GET['category'] : null;

//Get User From URL
$user_id = isset($_GET['user']) ? $_GET['user'] : null;

//Get Template & Assign Vars
$template = new Template('templates/topics.php');

//Assign  Category Template Variables
if (isset ($category)){
    $template->topics = $topic->getByCategory($category);
    $template->title = 'Post In "'.$topic->getCategory($category)->name.'"';
}

//Check for user filter
if (isset ($user_id)){
    $template->topics = $topic->getByUser($user_id);
 //   $template->title = 'Post By "'.$user->getUser($user_id)->username.'"';
}

if (!isset ($category) && !isset($user_id)){
    $template->topics = $topic->getAllTopics();
}

//assign Vars

$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();

//Display template
echo $template;