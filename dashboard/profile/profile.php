<?php

require '../master/header.php';

?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Settings Page</h1>
        </div>
    </div>
</div>



<!-- name update start -->

<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                USERNAME
            </div>
            <div class="card-body">
                <form action="update.php" method="POST">
                <div class="example-content">
                    <?php if(isset($_SESSION['name_update'])) : ?>
                    <div id="emailHelp" class="form-text text-success"><?= $_SESSION['name_update'] ?></div>
                    <?php endif; unset($_SESSION['name_update']) ?>
                    <label for="exampleInputEmail1" class="form-label">username</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <button type="submit" name="name_ubtn" class="btn btn-primary my-2"><i class="material-icons">add</i>Add</button> 
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                Password
            </div>
            <div class="card-body">
                <form action="update.php" method="POST">
                <div class="example-content">
                    <?php if(isset($_SESSION['pass_error'])) : ?>
                    <div id="emailHelp" class="form-text text-danger"><?= $_SESSION['pass_error'] ?></div>
                    <?php endif; unset($_SESSION['pass_error']) ?>


                    <?php if(isset($_SESSION['pass_update'])) : ?>
                    <div id="emailHelp" class="form-text text-success"><?= $_SESSION['pass_update'] ?></div>
                    <?php endif; unset($_SESSION['pass_update']) ?>



                    <label for="exampleInputEmail1" class="form-label">old password</label>
                    <input type="password" name="old_pass" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <label for="exampleInputEmail1" class="form-label my-2">new password</label>
                    <input type="password" name="new_pass" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <label for="exampleInputEmail1" class="form-label my-2">confirm password</label>
                    <input type="password" name="con_pass" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <button type="submit" name="pass_ubtn" class="btn btn-primary my-2"><i class="material-icons">add</i>Add</button> 
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- image part -->
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                IMAGE Update
            </div>
            <div class="card-body">
                <form action="update.php" method="POST" enctype="multipart/form-data">
                <div class="example-content">
                    <label for="exampleInputEmail1" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <button type="submit" name="image_ubtn" class="btn btn-primary my-2"><i class="material-icons">add</i>Add</button> 
                </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- name update end -->



<?php

include '../master/footer.php';

?>