<?php
// session_start();
require_once "includes/nav.php";
// require_once "../app/controller/UserController.php";

function authGuard()
{
    if (empty($_SESSION['logged'])) {
        header("location: /master/login");
    }
}
authGuard();

$Posts = new UserController();
$Posts = $Posts->selectPost();
// var_dump($Posts);
// echo $post['post_id']
// die();
$Comments = new UserController();
$Comments = $Comments->selectComent();
// var_dump($Comments);
?>
<div class="container">
    <div style="text-align: center; color:azure">
        <h3>Welcome <?= $_SESSION['username'] ?> </h3>
    </div>
    <div class="add-post ">
        <button id="ajoute" class="logout-btn"><i class="fas fa-plus">Add new post</i></button>
        <div class="form" id="form">
            <form action="user/addpost" method="post">
                <input type="text" name="title" class="form-control" placeholder="Movie / tv show name" style="margin-bottom: 17px;" value="">
                <input type="text" name="photo" class="form-control" placeholder="picture link" style="margin-bottom: 17px; " value="">

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
    </div>

    <div class="card-posts">

        <?php foreach ($Posts as $post) : ?>
            <!-- var_dump($Posts);
            die(); -->
            <div class="card">
                <div class="posts">
                    <div class="post-content">
                        <div class="post-userID" style="display: flex;">
                            <div style="display: flex;">
                                <img src="./public/Assets/img/userimg.jpg" style="height: 50px;" alt="">
                                <p><b> <?= $post->user ?> </b></p>
                            </div>
                            <div>
                                <form action="user/Delpost" method="post">
                                    <input type="hidden" name="id" value="<?php echo $post->post_id; ?>">
                                    <button class="btn btn-danger" name="deleteP" type="submit">delete</button>
                                </form>
                                <form action="user/editPost" method="post">
                                    <input type="hidden" name="id" value="<?php echo $post->post_id; ?>">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#film<?php echo $post->post_id; ?>" data-whatever="@mdo">Edit</button>

                                    <div class="modal fade" id="film<?php echo $post->post_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                                    <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>


                                                <div class="modal-body">
                                                    <form>
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">category:</label>
                                                            <select class="form-select" name="category" aria-label="Default select example" value="<?= $post->category ?>" style="margin-top: 17px;">
                                                                <option value="Action">Action</option>
                                                                <option value="Adventure">Adventure</option>
                                                                <option value="Comedy">Comedy</option>
                                                                <option value="Horror">Horror</option>
                                                                <option value="Romance">Romance</option>
                                                                <option value="Science-Fiction / Fantasia">Science-Fiction / Fantasia</option>
                                                                <option value="Sports">Sports</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="message-text" class="col-form-label">title:</label>
                                                            <input class="form-control" name="title" id="message-text" value="<?= $post->title ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="message-text" class="col-form-label">image:</label>
                                                            <input class="form-control" name="photo" id="message-text" value="<?= $post->image ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="message-text" class="col-form-label">description:</label>
                                                            <textarea class="form-control" name="description" id="message-text" value="<?= $post->description ?>"></textarea>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <button class="btn btn-secondary mt-1" name="editP" id="edit" type="submit">Edit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="post-image" style="margin-left: 10px;">
                            <h6 style="color: #777;"> <?= $post->category ?> </h6>
                            <h4> <?= $post->title ?> </h4>
                            <p> <?= $post->description ?> </p>
                            <img src="<?= $post->image ?>" alt="<?= $post->title ?>" />
                        </div>
                        <?php foreach ($Comments as $Comment) : ?>
                            <?php if ($post->post_id == $Comment->post_id) : ?>
                                <p><b> <?= $Comment->user ?> </b>: <?= $Comment->content ?> </p>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <div class="post-coment" style="margin-top: 30px;">
                            <form action="user/addComment" method="post">
                                <input type="hidden" name="post_id" value="<?php echo $post->post_id; ?>">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="content" placeholder="Comment" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-danger" name="PostComment" type="submit">Button</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <script src="./public/Assets/js/addNewPost.js"></script>
    <script src="http://localhost/master/public/Assets/js/addNewPost.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/js/bootstrap.min.js" integrity="sha512-UR25UO94eTnCVwjbXozyeVd6ZqpaAE9naiEUBK/A+QDbfSTQFhPGj5lOR6d8tsgbBk84Ggb5A3EkjsOgPRPcKA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="./public/Assets/js/hide.js"></script>


    </body>

    </html>