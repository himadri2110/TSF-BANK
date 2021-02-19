<html>
<head>
    <title>Transaction History</title>
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
        <h2 style="color: info;"><b>Transaction History</b></h2>

        <br>

        <div class="table-responsive">
            <table class="my-table container table table-bordered text-center table-sm table-hover shadow-lg p-3 mb-5 rounded">

                <thead style="background-color: rgb(51, 110, 146); color: white;">
                    <th>SR. NO</th>
                    <th>SENDER</th>
                    <th>RECEIVER</th>
                    <th>AMOUNT SENT</th>
                    <th>TIMESTAMP</th>
                </thead>

                <?php

                    include 'connection.php';

                    $j = 1;
                    $select = " SELECT * FROM `transfer` ";
                    $query = mysqli_query($conn, $select);
                    $nums = mysqli_num_rows($query);

                    while($res = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?php echo $j++ ;?></td>
                        <td><?php echo $res['Sender'] ;?></td>
                        <td><?php echo $res['Receiver'];?></td>
                        <td><?php echo "Rs. " . $res['Amount'] ;?></td>
                        <td><?php echo $res['Timestamp'] ;?></td>
                    </tr>  
                <?php
                    }
                ?>

            </table>

            <a href="view_customers.php" class="btn" style="background-color: rgb(51, 110, 146); color: white; width: 300px;">View all customers</a>
            <br><br>

        </div>
    </div>
    
    <br>

    <div class="text-center footer">
        &copy; 2021 | The Sparks Foundation
    </div>

</div>
</div>

</body>

</html>