<?php
include_once('app/config.php');
include('config/conn.php');
// If they try to visit this page directly
if (empty($_GET)) {
  header('Location: home.php');
}

$user = new User();
session_start();
// Check for user login
if (isset($_SESSION['user_login']))  {
  $username = $_SESSION['user_login'];
  $q = "SELECT user_id FROM users WHERE username = '$username'";
   $r = mysqli_query($conn,$q);
$row = mysqli_fetch_assoc($r);
$userid = $row['user_id'];
  $user = $user->getUser($mysqli, $userid);
  
  $relation = new Relation($mysqli, $user);
} else {
  header('Location: login.php');
}

$allowed_actions = array(
  'accept', // status to 1
  'decline', // status to 2
  'cancel', // delete relationship
  'block', // status 3
  'unblock', // delete relationship
  'add', // insert friend request
  'unfriend', // delete a friend
);

$allowed_friends = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);

if (1) {
  
  $action = $_GET['action'];
  $friend_id = (int) $_GET['friend_id'];
  $friend = new User();
  $friend = $friend->getUser($mysqli, $friend_id);
  
  // Process based on the action
  switch ($action) {
    case 'accept':
      $result = $relation->acceptFriendRequest($friend);
      break;
    case 'decline':
      $result = $relation->declineFriendRequest($friend);
      break;
    case 'cancel':
      $result = $relation->cancelFriendRequest($friend);
      break;
    case 'block':
      $result = $relation->block($friend);
      break;
    case 'unblock':
      $result = $relation->unblockFriend($friend);
      break;
    case 'add':
      $result = $relation->addFriendRequest($friend);
      break;
    case 'unfriend':
      $result = $relation->unfriend($friend);
      break;
  }
  
  // Set the message cookie so that it shows this message in the home page.
  if ($result) {
    setcookie('status', 'success');
  } else {
    setcookie('status', 'failed');
  }
  // Redirect to home
  header("Location: profile.php?uid=".$friend_id."");
} else {
  header("Location: home.php");
}
?>