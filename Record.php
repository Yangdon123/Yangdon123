<html>
    <head>
	  <title> Get a single record from a table example code </title>
    </head>
	<body>
	<TABLE>
	    <TH>Number</TH><TH>Last Name</TH><TH>First Name</TH>
		<?php
		    //$conn=mysqli_connect("host","user", "password",Database");
			$conn=mysqli_connect("localhost",root","","saleco");
		   // check connection
		      if(! $sconn) {die("Connection failed:". mysqli_connect_error());}
			 echo "Connected successfully <br>";
		   // once connection established prepare a query
		   $querry= "select * FROM tblcustomer where cusCade=10010";
		   // Run the query
		   $result = mysli_query($conn,$query) or die ("Unable to run the query");
		   echo("<br> Select returned ". mysqli_num_rows ($result)." rows.<br><br>");
		   $row=mysqli_fetch_row($result);
		   echo "<TR><TD>$row[0]</TD><TD>$row[1]</TD><TD>$row[2]</TD></TR>";
		   //Close connection to the database
		   mysqli_close($conn);
		  ?>
		</TABLE>
		</body>
	</html>
	