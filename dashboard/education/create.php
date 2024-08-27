<?php

include "../master/header.php";

include "../../public/fonts/fonts.php";

?>

<div class="row">
<div class="col-12">
        <div class="card">
            <div class="card-header">
                Education Insert 
            </div>
            <div class="card-body">
                <form action="store.php" method="POST">
                <div class="example-content">
                    <label for="exampleInputEmail1" class="form-label">Education Title</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <label for="exampleInputEmail1" class="form-label">Education Year</label>
                    <input type="text" name="year" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <label for="exampleInputEmail1" class="form-label">Education Ratio/Parsentage</label>
                    <!-- <input type="text" name="ratio" class="form-control hudai" id="exampleInputEmail1" aria-describedby="emailHelp"> -->
                    <select name="ratio" class="form-select">
                        <option value="0">Select Your Ratio</option>
                        <?php for($i=1;$i<=100;$i++) : ?>
                        <option value="<?= $i ?>">
                            <?= $i ?> %
                        </option>
                        <?php endfor; ?>
                    </select>
                    
                    <button type="submit" name="create" class="btn btn-primary my-2"><i class="material-icons">add</i>Add</button> 
                </div>
                </form>
            </div>
        </div>
    </div>
</div>




<?php

include "../master/footer.php";

?>
