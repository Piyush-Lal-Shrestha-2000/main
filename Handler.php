<?php
    require_once 'dbConnection.php';
    require_once 'config.php';
    if(isset($_POST['search'])){
        $sql = "SELECT * FROM dummy_data WHERE person_name LIKE '%".$_POST['searchVal']."%' LIMIT 5";
        $RS = mysqli_query($C, $sql);
        drawSearchTable($RS);
    }
    function drawSearchTable($RS){
?>
        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                <?php
                    if($_SESSION['isAdmin']){
                ?>
                    <th>Edit</th>
                    <th>Delete</th>
                <?php
                    }
                ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row = mysqli_fetch_assoc($RS)){
                ?>
                        <tr>
                            <td scope="row"><?php echo $row['person_id']; ?></td>
                            <td><?php echo $row['person_name']; ?></td>
                    <?php
                        if($_SESSION['isAdmin']){
                    ?>
                            <td><button id="editData" class="btn btn-primary" data-toggle="modal" onclick="loadEditDeleteForm(this)" data-target="#editModal" value="<?php echo $row['person_id']; ?>">Edit</button></td>
                            <td><button id="deleteData" class="btn btn-danger" data-toggle="modal" onclick="loadEditDeleteForm(this)" data-target="#deleteModal" value="<?php echo $row['person_id']; ?>">Delete</button></td>
                    <?php
                        }
                    ?>
                        </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
<?php
    }
    if(isset($_POST['load_edit_delete_form'])){
        $sql = "SELECT * FROM dummy_data WHERE person_id = '".$_POST['person_id']."'";
        $RS = mysqli_query($C, $sql);
        $disabled = '';
        $param_id1 = 'edit_person_id';
        $param_id2 = 'edit_person_name';
        if($_POST['form_action']=='Delete'){
            $disabled = 'disabled';
            $param_id1 = 'delete_person_id';
            $param_id2 = 'delete_person_name';
        }
        while($row = mysqli_fetch_assoc($RS)){
            echo "<label for='".$param_id1."' class='form-group'>ID: </label>";
            echo "<input id='".$param_id1."' type='text' class='form-group form-control' value='".$row['person_id']."' disabled>";
            echo "<label for='".$param_id2."' class='form-group'>Name: </label>";
            echo "<input id='".$param_id2."' type='text' class='form-group form-control' value='".$row['person_name']."' $disabled>";
        }
    }
    if(isset($_POST['perform_edit_delete'])){
        $sql = "";
        $action = '';
        if($_POST['perform']=='Edit'){
            $sql = "UPDATE dummy_data SET person_name = '".$_POST['person_name']."' WHERE person_id = '".$_POST['person_id']."'";
            $action = "UPDAT";
        }
        else{
            $sql = "DELETE FROM dummy_data WHERE person_id = '".$_POST['person_id']."'";
            $action = "DELET";
        }
        mysqli_query($C, $sql);
        if(mysqli_affected_rows($C)){
            echo "RECORD ".$action."ED SUCCESSFULLY.";
        }else{
            echo "ERROR ".$action."ING RECORD.";
        }
    }
    if(isset($_POST['perform_record_insert'])){
        $person_name = $_POST['person_name'];
        /*  Only taking name, as ID is auto increment. */
        $sql = "INSERT INTO dummy_data(person_name) VALUES('".$person_name."')";
        mysqli_query($C, $sql);
        if(mysqli_affected_rows($C))
            echo "RECORD INSERTED SUCCESSFULLY!";
        else
            echo "ERROR INSERTING RECORD!";
    }
    if(isset($_POST['pull_new_id'])){
        $sql = "SELECT person_id FROM dummy_data ORDER BY person_id DESC LIMIT 1";
        $RS = mysqli_query($C, $sql);
        while($row = mysqli_fetch_assoc($RS))
            echo $row['person_id']+1;
    }