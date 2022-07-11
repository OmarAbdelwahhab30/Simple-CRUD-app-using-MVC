<?php
require_once VIEW_PATH.DS."include".DS."header.php";
?>


<?php
    if (isset($_SESSION['message'])){
        ?>
        <div class="alert alert-success" role="alert">
            <?=$_SESSION['message']?>
        </div>

        <?php
unset($_SESSION['message']);
    }
        ?>
        <a href="<?=URLROOT?>EmployeeController/AddEmployee" class="btn btn-primary">Add New Employee </a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (!empty($data)){
                foreach ($data as $employee){?>
                    <tr>
                    <th scope="row"><?=$employee->id?></th>
                    <td><?=$employee->name?></td>
                    <td>
                        <a href="<?=URLROOT?>EmployeeController/UpdateEmployee/<?=$employee->id?>" class="btn btn-success">Update</a>
                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</a>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Deletion</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure to delete This Employee
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <a href="<?=URLROOT?>EmployeeController/DeleteEmployee/<?=$employee->id?>" type="button" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                    <?php
                }
                ?>
            <?php
            }else{
                ?>
                    <tr>
                        <td>
                            <div class="alert alert-info" role="alert">
                                There is no employees to show
                            </div>
                        </td>
                    </tr>
                    <?php
            }
            ?>

            </tbody>
        </table>



<?php
require_once VIEW_PATH.DS."include".DS."footer.php";
?>