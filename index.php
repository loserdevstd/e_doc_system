
<?php 
include('connect/conn.php');
include('head.php');
#check page active
    if($page=="regis"){
        $act="register";
    }elseif($page=="login"){
        $act="login";
    }elseif($page=="doc-in-list"){
        $act="doc-in-list";
    }elseif($page=="post_in_id"){
        $act="doc-in-list";
    }elseif($page=="doc-out-list"){
        $act="doc-out-list";
    }elseif($page=="post_out_id"){
        $act="doc-out-list";
    }else{
        $act="home";
    }
#include banner img
include('banner.php');
#include navigation bar
include('menu.php'); 
    if($page=="regis"){
        include('register.php');
    }elseif($page=="login"){
        include('login.php');
    }elseif($page=="doc-in-list"){
        include('post_doc_in.php');
    }elseif($page=="post_in_id"){
        include('post_in_id.php');
    }elseif($page=="doc-out-list"){
        include('post_doc_out.php');
    }elseif($page=="post_out_id"){
        include('post_out_id.php');
    }else{
        include('post_list.php');
    }
include('footer.php');
?>