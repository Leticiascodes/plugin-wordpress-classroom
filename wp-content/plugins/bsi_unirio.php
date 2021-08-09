<?php
session_start();
error_reporting(E_ALL); ini_set("display_errors", 1);
set_error_handler("var_dump");
include_once __DIR__ . '/../../vendor/autoload.php';

/**
* Plugin Name: BSI Unirio/Classroomm
*Description: Plugin que faz integração com a api do Google Classroom para disponibilizar as informações de Atividades postadas nos cursos pertencentes ao BSI Unirio
*Version: 1.0.0
*Author: Leticia Moreira
*/

function plugin_bsi(){ 

    $client = new Google_Client();
    $client->setAuthConfigFile(__DIR__ . '/../../vendor/credentials.json');
    $client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/wordpress/?page_id=2');
    $client->addScope(implode(' ', array(
           \Google_Service_Classroom::CLASSROOM_COURSES_READONLY,
           \Google_Service_Classroom::CLASSROOM_COURSEWORK_STUDENTS,
           \Google_Service_Classroom::CLASSROOM_COURSEWORK_ME,
           \Google_Service_Classroom::CLASSROOM_COURSEWORK_ME_READONLY,
           \Google_Service_Classroom::CLASSROOM_COURSEWORK_STUDENTS_READONLY
           )));
    
    if (! isset($_GET['code'])) {
      $auth_url = $client->createAuthUrl();
      //var_dump($auth_url);
      //header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
      echo '<script> window.location.href="https://accounts.google.com/o/oauth2/auth?response_type=code&access_type=online&client_id=246156337926-pih298t9fjmtsc09mh8df1vk0pg62r5p.apps.googleusercontent.com&redirect_uri=http%3A%2F%2Flocalhost%3A8080%2Fwordpress%2F%3Fpage_id%3D2&state&scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fclassroom.courses.readonly%20https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fclassroom.coursework.students%20https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fclassroom.coursework.me%20https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fclassroom.coursework.me.readonly%20https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fclassroom.coursework.students.readonly&approval_prompt=auto"</script>';
    } else {
      $client->authenticate($_GET['code']);
      $_SESSION['access_token'] = $client->getAccessToken();
      $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/';
      echo '<script> window.location.href = /; </script>';
      //echo '<script> location.replace("/wordpress/wp-admin/post.php?post=2&action=edit"); </script>';
      //header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
    }


    if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
      $client->setAccessToken($_SESSION['access_token']);
      $classroom = new Google_Service_Classroom($client);
      $resultsCourseWork = $classroom->courses_courseWork->listCoursesCourseWork(366617995481);
      var_dump($resultsCourseWork[0]->getTitle());
    } else {
      $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php';
      var_dump("CAIU NO ELSE");
      //header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
    }
  }
 
add_shortcode('plugin_teste', 'plugin_bsi');

