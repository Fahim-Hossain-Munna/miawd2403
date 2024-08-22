<?php

include "../master/header.php";
include "../../config/database.php";

$service_read = "SELECT * FROM portfolios";
$portfolios = mysqli_query($db, $service_read);
$result = mysqli_fetch_assoc($portfolios);

?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Portfolio Page </h1>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <?php if (isset($_SESSION['port_created'])) :  ?>
            <div class="alert alert-custom" role="alert">
                <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                <div class="alert-content">
                    <span class="alert-title"><?= $_SESSION['port_created'] ?></span>
                </div>
            </div>
        <?php endif;
        unset($_SESSION['port_created']); ?>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Portfolio</h4>
                <a href="./create.php" name="image_ubtn" class="btn btn-primary my-2"><i class="material-icons">add</i>Create</a>
            </div>
            <div class="card-body">

                <div class="example-content">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $num = 1;
                             if (empty($result)):
                            ?>
                                <tr>
                                    <td colspan="5" class="text-center">No portfolios found!</td>
                                </tr>
                                <?php
                                    else:
                                foreach ($portfolios as $portfolio):
                                ?>
                                    <tr>
                                        <th scope="row">
                                            <?= $num++ ?>
                                        </th>
                                        <td>
                                            <img src="../../public/portfolio/<?= htmlspecialchars($portfolio['image']) ?>" style="width:80px; height:80px;" alt="">
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($portfolio['title']) ?>
                                        </td>
                                        <td>
                                            <a href="store.php?statusid=<?= $portfolio['id'] ?>" class="<?= ($portfolio['status'] == 'deactive') ? 'badge bg-danger text-white' : 'badge bg-success text-white' ?>">
                                                <?= htmlspecialchars($portfolio['status']) ?>
                                            </a>
                                        </td>
                                        <td class="">
                                            <div class="d-flex justify-content-around">
                                                <a href="edit.php?editid=<?= $portfolio['id'] ?>">
                                                    <i class="fa fa-chain text-info fa-2x"></i>
                                                </a>
                                                <a href="store.php?deleteid=<?= $portfolio['id'] ?>">
                                                    <i class="fa fa-trash-o text-danger fa-2x"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                            <?php
                                endforeach;
                            endif;
                            ?>


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