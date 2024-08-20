<?php

include "../master/header.php";

include "../../public/fonts/fonts.php";

if(isset($_GET['edit'])){
    $id = $_GET['edit'];

    $select_query = "SELECT * FROM services WHERE id='$id'";
    $connect = mysqli_query($db,$select_query);
    $service = mysqli_fetch_assoc($connect);
}

?>

<div class="row">
<div class="col-8">
        <div class="card">
            <div class="card-header">
                Service Edit Page
            </div>
            <div class="card-body">
                <form action="store.php?edit_id=" method="POST">
                <div class="example-content">
                    <label for="exampleInputEmail1" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $service['title'] ?>">
                    <label for="exampleInputEmail1" class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $service['description'] ?>">
                    <label for="exampleInputEmail1" class="form-label">Icons</label>
                    <input readonly type="text" name="icon" class="form-control hudai" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $service['icon'] ?>">
                    <div class="card my-3">
                        <div class="card-body" style="overflow-y: scroll; height:300px;">
                            <div class="fa-2x">
                            <?php foreach($fonts as $font) : ?>
                            <span class="m-2">
                            <i class="<?= $font ?>" onclick="myFun(event)"></i>
                            </span>
                            <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary my-2"><i class="material-icons">add</i>Add</button> 
                </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>

let hudai = document.querySelector('.hudai');

function myFun(e){
    hudai.value = e.target.classList.value
}

</script>


<?php

include "../master/footer.php";

?>
