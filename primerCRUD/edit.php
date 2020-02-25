<?php
    include("db.php");

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM task WHERE id = $id";
        
        $getTask = mysqli_query($conn, $query);

        $title = "";
        $description = "";

        while ($fila =  mysqli_fetch_array($getTask)) {
            $title = $fila['title'];
            $description = $fila['description'];
        }
    }
?>

<?php 
    if(isset($_POST['update_task'])) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];

        $query = "UPDATE task SET title = '$title', description = '$description' WHERE id = $id";

        $result = mysqli_query($conn, $query);

        if(!$result) {
            die("Query Failed");
        }

        $_SESSION['message'] = 'Task updated succesfully';
        $_SESSION['message_type'] = 'success';

        header("Location: index.php");
    }
?>

<?php include("includes/header.php") ?>

<div class="contariner p-4">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card card-body">
                <form action="edit.php" method="POST">
                    <div class="form-group">
                        <label for="">New Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Task Title" autofocus value="<?= $title; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">New Description</label>
                        <textarea name="description" rows="2" class="form-control" placeholder="Task description"> <?= $description; ?> </textarea>
                    </div>
                    <input type="text" name="id" value="<?= $id ?>" style="display: none;">
                    <input type="submit" class="btn btn-success btn-block" name="update_task" value="Update">
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>