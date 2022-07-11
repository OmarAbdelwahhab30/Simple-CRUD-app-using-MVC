<?php
require_once VIEW_PATH.DS."include".DS."header.php";
?>
<?php
    if (isset($_SESSION['error'])){
        ?>
        <div class="alert alert-danger" role="alert">
            <?=$_SESSION['error']?>
        </div>
<?php
        unset($_SESSION['error']);
    }

if (isset($_SESSION['message'])){
    ?>
    <div class="alert alert-success" role="alert">
        <?=$_SESSION['message']?>
    </div>
    <?php
    unset($_SESSION['message']);
}
?>
    <a href="<?=URLROOT?>IndexController/index" class="btn btn-primary">Back To home Page</a>
    <form method="post" action="<?=URLROOT?>EmployeeController/AddEmployee">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Add Employee Name</label>
            <input type="text" name="username" class="form-control" id="exampleFormControlInput1" placeholder="Enter Employee Name">
        </div>
        <button class="btn btn-success" type="submit">Submit</button>
    </form>
<?php
require_once VIEW_PATH.DS."include".DS."footer.php";
?>