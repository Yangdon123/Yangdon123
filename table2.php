<html>
<head>
    <title>Get multiple records from a table example code</title>
</head>
<body>
<TABLE>
    <TH>Number</TH><TH>Last Name</TH><TH>First Name</TH>
    <?php
        // $conn = mysqli_connect("host","user","password","Database");
        $conn = mysqli_connect("localhost","root","","saleco");

        // Check connection
        if (!$conn) { 
            die("Connection failed: " . mysqli_connect_error());
        }
        echo "Connected successfully <br>";

        // Once connection established prepare a query
        $query = "Select * FROM tblcustomer";

        // Run the query
        $result = mysqli_query($conn, $query) or die("Unable to run the query");
        echo("<br> Select returned " . mysqli_num_rows($result) . " rows. <br><br>");

        // Print the result line by line
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            echo "<TR><TD>".$row['cusCode']."</TD><TD>".$row['cusLName']."</TD><TD>".$row['cusFName']."</TD></TR>";
        } // End of while

        // Close connection to the database
        mysqli_close($conn);
    ?>
</TABLE>
</body>
</html>