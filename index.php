<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Person App</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h1>Person List</h1>
<h3>
    <p>Server: <?php echo gethostname(); ?></p>
    <p>HTTP Port: <?php echo $_SERVER['SERVER_PORT']; ?></p>
</h3>

<table>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>IP Address</th>
    </tr>

    <?php
    // Koneksi ke database
    $servername = "localhost";
    $username = "personal";
    $password = "!personal1";
    $database = "person";

    $conn = new mysqli($servername, $username, $password, $database);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query data dari tabel users
    $sql = "";
    
    $result = $conn->query($sql);

    // Tampilkan data dalam tabel
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['first_name']}</td>
                    <td>{$row['last_name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['ip_address']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No users found</td></tr>";
    }

    // Tutup koneksi
    $conn->close();
    ?>

</table>

</body>
</html>
