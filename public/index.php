<?php
require_once __DIR__ . "/../vendor/autoload.php";
Toro::serve(array(
    "/" => "Controllers\\HomeController",
    "/signup" => "Controllers\\SignupController",
    "/login" =>"Controllers\\HomeController",
    "/menu" =>"Controllers\\MenuController",
    "/leaderboard" =>"Controllers\\LeaderboardController",
    "/addquestion" =>"Controllers\\AddquestionController",
    "/question" =>"Controllers\\QuestionController",
    "/logout" =>"Controllers\\LogoutController"
));
?>