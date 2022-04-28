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
      
        <title>Add User</title>
    </head>

    <body>
        <?php
            $connection = mysqli_connect("localhost", "root", "", "grip") or die("Can't connect");
            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $balance = $_POST['balance'];

                $sql = "INSERT INTO `Users`(`User_ID`, `Name`, `Email`, `Balance`) 
                VALUES(NULL,'{$name}','{$email}','{$balance}')";

                $result = mysqli_query($connection, $sql);

                if ($result) {
                    echo '<script>alert("User Added");</script>';
                }
            }
        ?>

        <header>
            <div class="brand px-4">
                <div>
                    <p class="pt-4">BASIC BANKING SYSTEM</p>
                </div>
            </div>
            <div class="legend">
                <p>Create User</p>
            </div>
            <div class="create-button text-right my-4 px-4">
                <a href="index.html">
                    <button class="btn btn-light mt-2">&ensp;Home&ensp;</button>
                </a>
            </div>
        </header>

        <div class="container">
            <div class="my_card">
                <form method="post" >
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-12 mt-4 mb-4">
                                <label>Name</label>
                                <input class="form-control" type="text" name="name" placeholder="Name" required>
                            </div>
                            <div class="col-12 mb-4">
                                <label>E-mail ID</label>
                                <input class="form-control" type="email" name="email" placeholder="E-mail ID" required>
                            </div>
                            <div class="col-12 mb-4">
                                <label>Initial Balance</label>
                                <input class="form-control" type="number" name="balance" placeholder="Initial Balance" required>
                            </div>
                            <div class="col-12 mb-4 text-center">
                                <input class="btn btn-outline-info" type="submit" name="submit" placeholder="Name" value="Add User">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="text-center mt-5">
                <div class="btn-group" role="group">
                    <a href="customers.php" class="btn btn-light">View Customers</a>
                </div>
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