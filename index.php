<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>comments</title>

    <link rel="stylesheet" href="./styles/style.css">

    <link rel="icon" href="https://yandex.ru/images/search?text=comments+icon&img_url=https%3A%2F%2Fcdn2.iconfinder.com%2Fdata%2Ficons%2Ffont-awesome%2F1792%2Fcommenting-o-1024.png&pos=0&rpt=simage&stype=image&lr=10262&parent-reqid=1699445152671489-5563124290046620005-balancer-l7leveler-kubr-yp-sas-19-BAL-6584&source=serp" />
</head>
<body>

<div class="container">

        <form action="addComment.php" method="post" class="commentForm">
            <textarea name="text" id="" cols="30" rows="10"></textarea>
            <button type="submit" class="submitBtn">Leave comment</button>
        </form>
        
        <div class="commentList">
            <p>comments</p>

                <?php
                    $mysql = new mysqli('127.0.0.1', 'root', 'root', 'commentsDB');
                    $result = $mysql->query("SELECT * FROM `comment`");
                    while ($row = mysqli_fetch_assoc($result)) { 
                        ?>
                        <div id=<?php echo $row['id'] ?> class="comments">

                            <div class="text"> <?php echo $row['text'] ?></div>
                            <div class="shortInfo">
                                <span><?php echo $row['subCommentNum'] ?> comment</span>
                                <div class="dropdown btn">
                                    <span>leave comment</span>
                                    <div class="dropdown-content">
                                        <form action="addSubComment.php" method="POST" class="commentForm">
                                            <input type="text" name="commentId" value=<?php echo $row['id'] ?> class="hidden">
                                            <textarea name="text" id="" cols="30" rows="10" class="subComment"></textarea>
                                            <button type="submit" class="submitBtn">Leave comment</button>
                                        </form>
                                    </div>  
                                </div>
                            </div>
                        </div>
                <?php    }
                ?>

        </div>

    </div>

</body>
</html>