<html>

<head>
    <title>TSF Bank</title>

    <?php include 'links.php' ?>
</head>

<body class="bg">

<div class="page-container">

<div class="content-wrap">
    <nav class="navbar navbar-expand-lg" style="height: 100px;">
        <a class="navbar-brand" href="#" style="font-size: xx-large; color:black;"><img src="TSF Logo.png">TSF Bank</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    
    </nav>

    <br>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="text-center">
                    <h1><B>Welcome to TSF Bank</B></h1>
                    <br><br>

                    <a href="view_customers.php" class="btn" style="background-color: rgb(51, 110, 146); color: white; width: 300px;">View all Customers</a>

                    <br><br>
                    <a href="transaction_history.php" class="btn" style="background-color: rgb(51, 110, 146); color: white; width: 300px;">Transaction History</a>
                    <br><br>
                </div>
            </div>

        </div>
    </div>
    
    <div class="text-center footer"style="vertical-align: center;">
        &copy; 2021 | The Sparks Foundation
    </div>

</div>
</div>
</body> 

</html>

<?php 
    include 'connection.php';
    if(!$conn) {
    
    ?>

        <script> 
            alert('Could not connect to the Database.');
        </script>

<?php
    }
?>