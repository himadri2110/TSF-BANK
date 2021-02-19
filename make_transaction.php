<?php
    include 'connection.php';

    date_default_timezone_set("Asia/Kolkata");
    $currentDateTime = date('Y-m-d H:i:s');

    if(isset($_POST['submit'])) {
        $sender = $_GET['c_id'];
        $receiver = $_POST['receiver'];
        $amount = $_POST['amount'];

        $from = "SELECT * FROM `customers` WHERE `C_ID` = '$sender'";
        $query = mysqli_query($conn, $from);
        $sql1 = mysqli_fetch_array($query);

        $to = "SELECT * FROM `customers` WHERE `Name` = '$receiver'";
        $query = mysqli_query($conn, $to);
        $sql2 = mysqli_fetch_array($query);
        
        if ($amount == "" OR $amount <= 0) {
            echo '<script type="text/javascript">;
                    alert("Please enter valid Amount");
                </script>';

        } else if ($amount > $sql1['Balance']) {
            echo '<script type="text/javascript">;
                    alert("OOPS! Insufficient balance");
                </script>';

        } else {
            $new_bal = $sql1['Balance'] - $amount;
            $inc_bal = "UPDATE `customers` SET `Balance` = '$new_bal' WHERE `C_ID` = '$sender'";
            mysqli_query($conn, $inc_bal);

            $new_bal = $sql2['Balance'] + $amount;
            $dec_bal = "UPDATE `customers` SET `Balance` = '$new_bal' WHERE `Name`='$receiver'";
            mysqli_query($conn, $dec_bal);

            $sender = $sql1['Name'];
            $receiver = $sql2['Name'];
            $insert = "INSERT INTO `transfer`(`Sender`, `Receiver`, `Amount`, `Timestamp`) VALUES ('$sender','$receiver','$amount','$currentDateTime')";
            $query = mysqli_query($conn, $insert);

            if($query) {
                echo '<script type="text/javascript">;
                alert("Transaction Successful");
                window.location.href = "transaction_history.php";
                </script>';
            }
        }

    }
?>

<html>
<head>
    <title>Make a Transaction</title>
    <?php 
        include 'links.php'; 
    ?>
</head>

<body style="background-color: rgb(230, 230, 230);">

<div class="page-container">

<div class="content-wrap">
    <nav class="navbar navbar-expand-lg" style="height: 100px;">
        <a class="navbar-brand" href="index.php" style="font-size: xx-large; color:black;"><img src="TSF Logo.png">TSF Bank</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    
    </nav>

    <div class="container text-center">
        <h2 style="color: info;"><b>Transfer Money</b></h2>
        <br>

        <?php
            include 'connection.php';
            $cid = $_GET['c_id'];
            $select = " SELECT * FROM `customers` WHERE C_ID='$cid'";
            $query = mysqli_query($conn, $select);
            
            if(!$query) {
                echo "Error : ".$select."<br>".mysqli_error($conn);
            }

            $res = mysqli_fetch_assoc($query)
        ?>

        <form method="POST" class="dropdown"> 

        <div class="container table-responsive">
            <table class="container table table-bordered text-center table-sm table-hover shadow-lg p-3 mb-5 rounded" style="width: 80%;">

                <thead>
                    <th style="width: 50%; background-color: rgb(51, 110, 146); color: white;">SENDER</th>
                    <th style="width: 50%; background-color: rgb(51, 110, 146); color: white;">RECEIVER</th>
                </thead>

                <tr>
                    <td name="sender" style="vertical-align: middle;">
                        <?php echo $res['Name'] ." (Balance: Rs. " . $res['Balance'] . ")"; ?>
                    </td>

                    <td class="select" style="padding-top: 15px; padding-bottom: 17px;" >

                    <select name="receiver" style="width: 85%; color: black;" class="custom-select" data-live-search="true">

                    <?php
                        include 'connection.php';
                        $cid = $_GET['c_id'];
                        $select = " SELECT * FROM `customers` WHERE C_ID!='$cid'";
                        $query = mysqli_query($conn, $select);
                        
                        if(!$query) {
                            echo "Error : ".$select."<br>".mysqli_error($conn);
                        }

                        while($res = mysqli_fetch_assoc($query)) {
                    ?>

                            <div class="form-group">
                                <option class="form-control">
                                    <?php echo $res['Name'] ;?>
                                </option>
                            </div>

                        <?php
                            }
                        ?>
                        </select>

                    </td>

                </tr>

                <tr>
                </tr>

                <tr>
                    <th colspan=4 style="background-color: rgb(51, 110, 146); color: white; ">AMOUNT</th>
                </tr>

                <tr>
                    <td colspan=4>
                        
                            <div class="input-group form-group container" style="width: 430px !important; padding-top: 15px; padding-bottom: 0px;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rs.</span>
                                </div> 

                                <input type="text" name="amount" class="form-control" placeholder="Enter Amount">

                            </div>
                        
                    </td>
                </tr>

            </table>
            
            
            <input type="Submit" name="submit" value="Send" class="btn" style="width: 200px; background-color: rgb(51, 110, 146); color: white; ">


        </div>

        </form>
    </div>

    <br>

    <div class="text-center footer">
        &copy; 2021 | The Sparks Foundation
    </div>

</div>
</div>

</body>
</html>