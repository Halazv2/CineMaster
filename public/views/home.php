<?php
require_once "includes/nav.php";
// require_once "../app/controller/UserController.php";

session_start();


function authGuard()
{
    var_dump($_SESSION['logged']);
    if (!isset($_SESSION)) {
        session_start();
    }

    if (empty($_SESSION['logged'])) {
        header("location: ../login");
    }
}
authGuard();

$Posts = new UserController();
$Posts = $Posts->selectPost();
// var_dump($Posts);
?>
<div class="container">
    <div class="add-post ">
        <button id="ajoute" class="logout-btn"><i class="fas fa-plus">Add new post</i></button>
        <div class="form" id="form">
            <form action="user/addpost" method="post">
                <input type="text" name="title" class="form-control" placeholder="Movie / tv show name" style="margin-bottom: 17px;">
                <input type="file" name="photo" class="form-control" placeholder="Movie / tv show name" style="margin-bottom: 17px;">

                <select class="form-select" name="category" aria-label="Default select example" style="margin-top: 17px;">
                    <option value="Action">Action</option>
                    <option value="Adventure">Adventure</option>
                    <option value="Comedy">Comedy</option>
                    <option value="Horror">Horror</option>
                    <option value="Romance">Romance</option>
                    <option value="Science-Fiction / Fantasia">Science-Fiction / Fantasia</option>
                    <option value="Sports">Sports</option>
                </select>
                <div class="input-group">
                    <textarea class="form-control" placeholder="what do you think of this show" name="description" aria-label="With textarea" style="margin-top: 17px;"></textarea>
                </div>
                <button class="btn btn-primary" name="ADD" style="margin-top: 17px;">Post</button>
            </form>
        </div>
    </div>
    <div id="slideer" style="margin-top: 10px;">
        <button id="hide" class="logout-btn"><i class="fas fa-plus">see what new</i></button>
        <div class="slider" id="slider">
            <div class="whatsNew">
                <div class="whatsNew-Card splide">
                    <figure>
                        <img src="./public/Assets/img/poster.jpg" alt="">
                    </figure>
                    <div class="story">
                        <h4><b>Movie Name</b></h4>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nesciunt odio eos aut cupiditate?</p>
                    </div>
                </div>
            </div>
            <div class="whatsNew">
                <div class="whatsNew-Card splide">
                    <figure>
                        <img src="./public/Assets/img/poster.jpg" alt="">
                    </figure>
                    <div class="story">
                        <h4><b>Movie Name</b></h4>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nesciunt odio eos aut cupiditate?</p>
                    </div>
                </div>
            </div>
            <div class="whatsNew">
                <div class="whatsNew-Card splide">
                    <figure>
                        <img src="./public/Assets/img/poster.jpg" alt="">
                    </figure>
                    <div class="story">
                        <h4><b>Movie Name</b></h4>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nesciunt odio eos aut cupiditate?</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-posts">

            <?php foreach ($Posts as $post) : ?>
                <div class="card">
                    <div class="posts">
                        <div class="post-content">
                            <div class="post-userID" style="display: flex;">
                                <img src="./public/Assets/img/userimg.jpg" style="height: 50px;" alt="">
                                <p><b> <?= $post->user ?> </b></p>
                            </div>
                            <div class="post-image">
                                <h4> <?= $post->title ?> </h4>
                                <h6> <?= $post->category ?> </h6>
                                <p> <?= $post->description ?> </p>
                                <img src="imgs/<?= $post['image'] ?>" alt="<?= $post['title'] ?>">
                            </div>
                            <div class="post-coment">
                                <form action="" method="post" style="display: flex;">
                                    <input type="text" name="title" class="form-control" placeholder="what do you think" style="margin: 17px 0px 10px ;">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <script src="./public/Assets/js/addForm.js"></script>
        <script src="./public/Assets/js/hide.js"></script>

                
        </body>

        </html>