<?php

include '../master/header.php';

?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Links Page</h1>
        </div>
    </div>
</div>


<div class="col-6">
        <div class="card">
            <div class="card-header">
                Links
            </div>
            <div class="card-body">
                <form action="link_manage.php" method="POST">
                <div class="example-content">
                    <label for="exampleInputEmail1" class="form-label">Facebook</label>
                    <input type="text" name="facebook" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <label for="exampleInputEmail1" class="form-label">Instagram</label>
                    <input type="text" name="instagram" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <label for="exampleInputEmail1" class="form-label">Twitter</label>
                    <input type="text" name="twitter" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <label for="exampleInputEmail1" class="form-label">Pinterest</label>
                    <input type="text" name="pinterest" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <button type="submit" name="link_ubtn" class="btn btn-primary my-2"><i class="material-icons">add</i>Add</button> 
                </div>
                </form>
            </div>
        </div>
    </div>

<?php

include '../master/footer.php';

?>