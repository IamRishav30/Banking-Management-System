<!DOCTYPE html5>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="assets/style.css" type="text/css">

        <title>Our Customers</title>

    </head>

    <body>

        <header>
            <div class="brand px-4">
                <div>
                    <p class="pt-4">BASIC BANKING SYSTEM</p>
                </div>
            </div>
            <div class="legend">
                <p>Our Customers</p>
            </div>
            <div class="create-button text-right my-4 px-4">
                <a href="index.html">
                    <button class="btn btn-light mt-2">&ensp;Home&ensp;</button>
                </a>
            </div>
        </header>

        <div class = "container">
            
            <?php
                $connection = mysqli_connect("localhost","root","","grip") or die("Can't connect");
                $sql = "SELECT * FROM `Users`";
                $result = mysqli_query($connection,$sql);
                $num = mysqli_num_rows($result);
                if ($num>0) {
                    echo "<table class = 'table table-striped table-light'><thead class = 'thead-dark'><tr><th>User ID</th><th>Name</th><th>Email ID</th><th>Balance&ensp;(in Rs.)</th></tr></thead>";

                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><td>" . $row['User_ID']. "</td><td>" . $row['Name']. "</td><td>" . $row['Email']. "</td><td>" . $row['Balance']. "</td></tr>";
                    }
                    echo "</table>";
                }
                else {
                    echo "0 results";
                }
            ?>


            <div class="text-center mt-5">
                <div class="btn-group" role="group">
                    <a href="transfer_money.php" class="btn btn-light">Transfer Money</a>
                </div>
                <div class="btn-group" role="group">
                    <a href="transaction_history.php" class="btn btn-light">Transaction History</a>
                </div>
            </div>

        </div>

        <footer class="footer">
            <div class="text-center">
                Developed by &nbsp;
                <a href="https://github.com/IamRishav30">
                    Rishav Kanungo
                </a>
            </div>
        </footer>

    </body>

</html>