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

        <title>Transfer Money</title>

    </head>

    <body>
        <?php
            $connection = mysqli_connect("localhost", "root", "", "grip") or die("Can't connect");
            if (isset($_POST['submit'])) {
                $trans_from = $_POST['from'];
                $trans_to = $_POST['to'];
                $trans_amount = $_POST['Amount'];

                $self = "SELECT * FROM Users WHERE USER_ID = $trans_from";
                $resultf = mysqli_query($connection, $self);
                $user_fr = mysqli_fetch_assoc($resultf);


                $selt = "SELECT * FROM Users WHERE USER_ID = $trans_to";
                $resultt = mysqli_query($connection, $selt);
                $user_to = mysqli_fetch_assoc($resultt);

                if ($trans_amount <= 0) {
                    echo '<script>alert("Amount must be greater than zero");</script>';
                }

                if ($trans_amount > $user_fr['Balance']) {
                    echo '<script>alert("Sender does not have sufficient amount to transfer");</script>';
                }

                if ($trans_from == $trans_to){
                    echo '<script>alert("Sender and Receiver must be different");</script>';
                }

                else if(($trans_amount>0)&&($trans_amount<$user_fr['Balance'])){
                    $new = $user_fr['Balance'] - $trans_amount;
                    $sql = "UPDATE `Users` SET `Balance` = $new WHERE `Users`.`User_ID` = $trans_from";
                    $execute = mysqli_query($connection, $sql);

                    $new = $user_to['Balance'] + $trans_amount;
                    $sql = "UPDATE `Users` SET `Balance` = $new WHERE `Users`.`User_ID` = $trans_to";
                    $execute = mysqli_query($connection, $sql);

                    $sendername = $user_fr['Name'];
                    $recname = $user_to['Name'];
                    $insert = "INSERT INTO `Transactions`(`Sno`, `Sender`, `Reciever`, `Amount`) 
                                VALUES(NULL,'{$sendername}','{$recname}','{$trans_amount}')";
                    $execute = mysqli_query($connection, $insert);

                    if ($execute) {
                        echo '<script>alert("Money transferred successfully");</script>';
                    }

                    $new = 0;
                    $trans_amount = 0;
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
                <p>Transfer Money</p>
            </div>
            <div class="create-button text-right my-4 px-4">
                <a href="index.html">
                    <button class="btn btn-light mt-2">&ensp;Home&ensp;</button>
                </a>
            </div>
        </header>



        <div class="container">
            <form class="form-group" method="post">
                <div class="form-row my_card">
                    <div class="input-group mb-3 col-4">
                        <select name="from" class="form-control form-select" required>
                            <option value="" disabled selected>From</option>
                                <?php
                                    $connection = mysqli_connect("localhost", "root", "", "grip") or die("Can't connect");
                                    $sql = "SELECT * FROM `Users`";
                                    $result = mysqli_query($connection, $sql);
                                    while ($rows = mysqli_fetch_assoc($result)) {
                                ?>
                            <option class="table" value="<?php echo $rows['User_ID']; ?>">
                                        <?php echo $rows['Name']; ?> [Balance:
                                        <?php echo $rows['Balance']; ?> ]</option>
                                        <?php
                                    }
                                ?>
                        </select>
                    </div>



                    <div class="input-group mb-3 col-4">
                        <select name="to" class="form-control" required>
                            <option value="" disabled selected>To</option>
                                <?php
                                    $connection = mysqli_connect("localhost", "root", "", "grip") or die("Can't connect");
                                    $sql = "SELECT * FROM `Users`";
                                    $result = mysqli_query($connection, $sql);
                                    while ($rows = mysqli_fetch_assoc($result)) {
                                ?>
                            <option class="table" value="<?php echo $rows['User_ID']; ?>">
                                        <?php echo $rows['Name']; ?> [Balance:
                                        <?php echo $rows['Balance']; ?> ]</option>
                                        <?php
                                    }
                                ?>
                        </select>
                    </div>



                    <div class="input-group mb-3 col-4">
                        <input class="form-control" placeholder="Amount" type="number" name="Amount" required>
                    </div>

                    <div class="col-4"></div>

                    <div class="col-4 mt-5">
                        <button class="form-control btn btn-outline-info " type="submit" name="submit">Transfer</button>
                    </div>
                </div> 
            </form>
        </div>


        <div class="text-center mt-5">
            <div class="btn-group" role="group">
                <a href="customers.php" class="btn btn-light">View Customers</a>
            </div>
            <div class="btn-group" role="group">
                <a href="transaction_history.php" class="btn btn-light">Transaction History</a>
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