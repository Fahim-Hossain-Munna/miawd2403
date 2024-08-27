<?php

include "../master/header.php";
include "../../config/database.php";

$service_read = "SELECT * FROM services";
$services = mysqli_query($db,$service_read);

$education_read = "SELECT * FROM educations";
$educations = mysqli_query($db,$education_read);
$education = mysqli_fetch_assoc($educations);



?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Services Page</h1>
        </div>
    </div>
</div>

<!-- <div class="row">
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


    <?php if(isset($_SESSION['service_status'])) :  ?>
    <div class="alert alert-custom" role="alert">
        <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
        <div class="alert-content">
            <span class="alert-title"><?= $_SESSION['service_status'] ?></span>
        </div>
    </div>
    <?php endif; unset($_SESSION['service_status']); ?>
    </div>
</div> -->

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
                                <th scope="col">Title</th>
                                <th scope="col">Year</th>
                                <th scope="col">Ratio</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($education)) : ?>
                                    <tr>
                                        <th colspan="5" class="text-center text-danger">
                                            No data found!!
                                        </th>
                                    </tr>
                                <?php else : ?>
                            <?php
                            $num = 1;
                            foreach($educations as $education):
                            ?>
                            <tr>
                                <th scope="row">
                                    <?= $num++ ?>
                                </th>
                                <td>
                                    <?= $education['title'] ?>
                                </td>
                                <td>
                                <?= $education['year'] ?>
                                </td>
                                <td>
                                <?= $education['ratio'] ?> %
                                </td>
                                <td class="">
                                    <div class="d-flex justify-content-around">
                                        <a href="edit.php?edit=<?= $service['id'] ?>">
                                            <i class="fa fa-chain text-info fa-2x"></i>
                                        </a>
                                        <a href="store.php?id=<?= $service['id'] ?>">
                                            <i class="fa fa-trash-o text-danger fa-2x"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; endif; ?>
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