<html>
<head>
    <title>View all Customers</title>
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
        <h2><B>List of all Customers</b></h2>

        <br>

        <div class="table-responsive">
            <table class="my-table table table-bordered text-center table-sm table-hover shadow-lg p-3 mb-5 rounded" name="my_table">
                <thead style="background-color: rgb(51, 110, 146); color: white;">
                <th>SR. NO</th>
                <th>C_ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>BALANCE</th>
                <th>TRANSFER</th>
                </thead>
                
                <?php
                    $i = 1;
                    include 'connection.php';

                    $select = " SELECT * FROM `customers` ";
                    $query = mysqli_query($conn, $select);

                    while($res=mysqli_fetch_assoc($query)) {
                ?>
                    <tr class="text-center">

                        <td><?php echo $i++ ;?></td>
                        <td><?php echo $res['C_ID'] ;?></td>
                        <td><?php echo $res['Name'] ;?></td>
                        <td><?php echo $res['Email'] ;?></td>
                        <td><?php echo "Rs. " . $res['Balance'] ;?></td>
                        <td><a href="make_transaction.php?c_id=<?php echo $res['C_ID'] ;?>"><i class="fa fa-paper-plane"></i></a></td>
                    </tr>  
                <?php
                    }
                ?>

            </table>
        </div>
    </div>

    <div class="text-center footer">
        &copy; 2021 | The Sparks Foundation
    </div>

</div>
</div>
</body>
</html>