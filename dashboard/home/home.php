<?php

include "../master/header.php";


$user_query = "SELECT * FROM users";

$users = mysqli_query($db,$user_query);

?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Dashboard</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
    <?php if(isset($_SESSION['temp_name'])) :  ?>
    <div class="alert alert-custom" role="alert">
        <div class="custom-alert-icon icon-dark"><i class="material-icons-outlined">done</i></div>
        <div class="alert-content">
            <span class="alert-title">Welcome Cheif, Mr. <?= $_SESSION['temp_name'] ?></span>
            <span class="alert-text">Email is <?= $_SESSION['auth_email'] ?></span>
        </div>
    </div>
    <?php endif; unset($_SESSION['temp_name']); ?>
    </div>
</div>


<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                Users List
            </div>
            <div class="card-body" style="overflow-y: scroll; height:300px">
            <div class="example-content">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $serial = 1;
                            $id = $_SESSION['auth_id'];
                            foreach($users as $user) : 
                            
                            if($user['id'] == $id){
                                continue;
                            }
                            ?>
                            <tr>
                                <th scope="row"><?= $serial++ ?></th>
                                <td><?= $user['name']  ?></td>
                                <td><?= $user['email']  ?></td>
                                <td>@mdo</td>
                            </tr>
                            <?php endforeach;  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

include "../master/footer.php";

?>