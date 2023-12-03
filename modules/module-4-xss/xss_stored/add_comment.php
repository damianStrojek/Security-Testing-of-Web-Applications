<?php
    $myPDO = new PDO('sqlite:./com_cats.db');
    $post_id = $_POST['post_id'];
    $content = $_POST['content'];
    if (empty($post_id) || empty($content)) {
        header("Location: ./com_cats.php");
    }
    $insert_query = "INSERT INTO comments (post_id, content) VALUES (" . $post_id . ", '" . $content . "')";
    $myPDO->query($insert_query);
    header("Location: ./com_cats.php");
?>