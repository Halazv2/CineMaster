<?php foreach ($posts as $post) : ?>

    <div class="card">
        <div class="posts">
            <div class="post-content">
                <div class="post-userID" style="display: flex;">
                    <img src="./public/Assets/img/userimg.jpg" style="height: 50px;" alt="">
                    <p><b><?= $user['first_name'] ?></b></p>
                </div>
                <div class="post-image">
                    <img src="imgs/<?= $post['image'] ?>" alt="<?= $post['title'] ?>">
                </div>
                <div class="post-coment">
                    <form action="" method="post" style="display: flex;">
                        <input type="text" name="title" class="form-control" placeholder="what do you think" style="margin: 17px 0px 10px ;">
                    </form>
                </div>
            </div>


        <?php endforeach; ?>





        <div class="card-posts">

            <div class="card">
                <div class="posts">
                    <div class="post-content">
                        <div class="post-userID" style="display: flex;">
                            <img src="./public/Assets/img/userimg.jpg" style="height: 50px;" alt="">
                            <p><b>Username</b></p>
                        </div>
                        <div class="post-image">
                            <img src="./public/Assets/img/poster.jpg" alt="">
                        </div>
                        <div class="post-coment">
                            <form action="" method="post" style="display: flex;">
                                <input type="text" name="title" class="form-control" placeholder="what do you think" style="margin: 17px 0px 10px ;">
                            </form>
                        </div>
                    </div>
                </div>
            </div>