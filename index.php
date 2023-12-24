<?php include('header.php');  ?>
<?php include('dbcon.php'); ?>

<div class="box1">
    <h2>ALL STUDENTS</h2>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Students</button>
</div>
<table class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
                $query = "select * from `students`";
                $result = mysqli_query($conn, $query);

                if(!$result){
                    die("query Failed" . mysqli_error());
                }
                else{
                    while($row = mysqli_fetch_assoc($result)){
        ?>

        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><a href="update_page_1.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a></td>
            <td><a href="delete_page.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
        </tr>


        <?php

                    }
                }
        ?>


    </tbody>
</table>

<?php
    if(isset($_GET['message'])){
        echo "<h6>" . $_GET['message'] . "</h6>";
    }
?>
<?php
    if(isset($_GET['insert_msg'])){
        echo "<h6>" . $_GET['insert_msg'] . "</h6>";
    }
?>
<?php
    if(isset($_GET['update_msg'])){
        echo "<h6>" . $_GET['update_msg'] . "</h6>";
    }
?>
<?php
    if(isset($_GET['deletet_msg'])){
        echo "<h6>" . $_GET['delete_msg'] . "</h6>";
    }
?>

<form action="insert_data.php" method="POST">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="f_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="l_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <input type="text" name="age" class="form-control">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="Submit" class="btn btn-success" name="add_student" value="Add">
                </div>
            </div>
        </div>
    </div>
</form>


<?php include('footer.php'); ?>