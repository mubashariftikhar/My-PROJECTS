<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD APP</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container my-5">
        <h2>List Of Clients</h2>
        <a class="btn btn-primary" href="/php-crud-app/create.php" role="button"> New Client</a><br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "myshop_crud";

                // create connection

                $conn = new mysqli($servername, $username, $password, $database);

                // check connection
                if ($conn->connect_error) {
                    die("Connection failed" . $conn->connect_error);
                }

                //  read all row from database table
                $sql = "SELECT * FROM clients";
                $result = $conn->query($sql);

                if (!$result) {
                    die("Invalid Query" . $conn->connect_error);
                }

                // read data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "
            <tr>
            <td>$row[id]</td>
            <td>$row[name]</td>
            <td>$row[email]</td>
            <td>$row[phone]</td>
            <td>$row[address]</td>
            <td>$row[created_at]</td>
            <td>
            ";
                    if ($result) {
                        while (
                            $row = mysqli_fetch_assoc($result)
                        ) {
                            $id = $id + 1;
                            echo "<tr>
          <th scope='row'> " . $id . "</th>
          <td> " . $row['name'] . "</td>
          <td>" . $row['email'] . "</td>
         <a class='btn btn-primary' id=" . $row['id'] . "btn-sm'href='/php-crud-app/edit.php'>Edit</a>
         <a class='btn btn-primary'id=" . $row['id'] . " btn-sm'href='/php-crud-app/delete.php' role='button'>Delete</a>
        </td>
            
        </tr>
                ";
                        }
                    }
                }

                ?>

            </tbody>
        </table>

    </div>

</body>

</html>