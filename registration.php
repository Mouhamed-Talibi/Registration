<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Registration | Seeing data.</title>
    </head>

    <body>
    <?php
        // connecting to database? 
        $host= "localhost";
        $user= "root";
        $pass= "";
        $db= "registration";
        $connect = mysqli_connect($host, $user, $pass, $db);
        $res = mysqli_query($connect, "SELECT * FROM students");
        // setting the data? 
        $id = "";
        $f_name = "";
        $l_name = "";
        $department = "";
        $age = "";
        // checking if the user write the data   
        if (isset($_POST["id"])) {
            $id = $_POST["id"];
        }
        if (isset($_POST["f-name"])) {
            $f_name = $_POST["f-name"]; 
        }
        if (isset($_POST["l-name"])) {
            $l_name = $_POST["l-name"];
        }
        if (isset($_POST["department"])) {
            $department = $_POST["department"];
        }
        if (isset($_POST["age"])) {
            $age = $_POST["age"];
        }
        // add and delete 
        $query = "";
        if (isset($_POST['add'])) {
            $query = "INSERT INTO students VALUES($id, '$f_name', '$l_name', '$department', $age)";
            mysqli_query($connect, $query);
            header("location: registration.php");
        }
        if (isset($_POST['del'])) {
            $query = "DELETE FROM students WHERE id=$id";
            mysqli_query($connect, $query);
            header("location: registration.php");
        }
        ?>

        <form action="" method="POST">
            <aside>
                <img src="" alt="Logo-Sit">
                <br><br><br>
                <b>controle panel</b>
                <br><br><br>
            <div>
                    <label for="">Identifier</label><br>
                    <input type="text" name="id">
                    <br>
                    <label for="">First Name</label><br>
                    <input type="text" name="f-name">
                    <br>
                    <label for="">Last Name</label><br>
                    <input type="text" name="l-name">
                    <br>
                    <label for="">Department</label><br>
                    <input type="text" name="department">
                    <br>
                    <label for="">Age</label><br>
                    <input type="text" name="age">
                    <br><br><br>
                </div>
                <strong>If you want to delete a member , just write his or her <span>Identifier</span></strong>
                <br><br>
                <button name="add">Add User</button>
                <br>
                <button name="del">Delete User</button>
            </aside>

            <main>
                <table id="table">
                    <thead>
                        <tr>
                            <th>Identifier</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Depatement</th>
                            <th>Age</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($row=mysqli_fetch_array($res)) {
                                echo "<tr>";
                                    print '<td>' .$row["id"] . "</td>";
                                    print '<td>' .$row["f_name"] . "</td>";
                                    print '<td>' .$row["l_name"] . "</td>";
                                    print '<td>' .$row["department"] . "</td>";
                                    print '<td>' .$row["age"] . "</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </main>
        </form>
    </body>
</html>