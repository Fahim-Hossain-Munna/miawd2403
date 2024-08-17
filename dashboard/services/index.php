<?php

include "../master/header.php";
include "../../config/database.php";

$service_read = "SELECT * FROM services";
$services = mysqli_query($db,$service_read);


?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Services Page</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
    <?php if(isset($_SESSION['service_created'])) :  ?>
    <div class="alert alert-custom" role="alert">
        <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
        <div class="alert-content">
            <span class="alert-title"><?= $_SESSION['service_created'] ?></span>
            <!-- <span class="alert-text">Email is <?= $_SESSION['auth_email'] ?></span> -->
        </div>
    </div>
    <?php endif; unset($_SESSION['service_created']); ?>
    </div>
</div>

<div class="row">
    <div class="col-12">
    <?php if(isset($_SESSION['service_delete'])) :  ?>
    <div class="alert alert-custom" role="alert">
        <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
        <div class="alert-content">
            <span class="alert-title"><?= $_SESSION['service_delete'] ?></span>
        </div>
    </div>
    <?php endif; unset($_SESSION['service_delete']); ?>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Services</h4>
            <a href="./create.php" name="image_ubtn" class="btn btn-primary my-2"><i class="material-icons">add</i>Create</a> 
            </div>
            <div class="card-body">
                
            <div class="example-content">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Icon</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $serial = 1;
                            foreach($services as $service) : ?>
                            <tr>
                                <th scope="row">
                                    <?= $serial++ ?>
                                </th>
                                <td>
                                    <i class="fa-3x <?= $service['icon'] ?>"></i>
                                </td>
                                <td>
                                <?= $service['title'] ?>
                                </td>
                                <td>
                                <?= $service['description'] ?>
                                </td>
                                <td>
                                    <a href="store.php?id=<?= $service['id'] ?>">
                                        <i class="fa fa-trash-o text-danger fa-2x"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>


            </div>
        </div>
    </div>
</div>


<?php

include "../master/footer.php";

?>