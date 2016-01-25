<!DOCTYPE html>
<html>
   <head>
      <meta charset = "utf-8">
      <title>Search Results</title>
   <script type="text/JavaScript">
	  function btnOnClk ()
	  {
		 window.location.href = "deliCustomer.html";
		
	  }
   </script>
   <style type = "text/css">
         body  { font-family: sans-serif;
                 background-color: lightyellow; } 
         table { background-color: lightgreen; 
                 border-collapse: collapse; 
                 border: 1px solid gray; }
         td    { padding: 5px; }
         tr:nth-child(odd) {
                 background-color: lightblue; }
      </style>
   </head>
   <body>
     <?php
       $name = $_POST["name"];
       $foodType = $_POST["product"];
       $brand = $_POST["brand"];
       $amount = $_POST["quantity"];	 
	 
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "deli";

       // Create connection
       $conn = new mysqli($servername, $username, $password, $dbname);

	   // Check connection
       if ($conn->connect_error) 
	   {
		  die("Connection failed: " . $conn->connect_error);
       } 

       // build INSERT query
       $query = "INSERT INTO delicounter " . "( name, food_type, brand, amount) " . "VALUES ( '$name', '$foodType', '$brand', '$amount')";
       $result = $conn->query($query);

	   //build SELECT query
	   $query2 = "SELECT * FROM delicounter";
       $result2 = $conn->query($query2);

       $conn->close();
     ?>
	 <table>
	 <?php	   
	   echo "DELI ORDERS";
       echo "<tr ><td>NAME</td><td>FOOD TYPE</td><td>BRAND</td><td>AMOUNT</td></tr>";
       while ($row = mysqli_fetch_array($result2)) 
	   {
		   echo "<tr>";
           echo "<td>". $row["name"] . "</td>";
           echo "<td>". $row["food_type"] . "</td>";
		   echo "<td>". $row["brand"] . "</td>";
		   echo "<td>". $row["amount"] . "</td>";
           echo "</tr>";
       }
	 ?>
	 </table><br>
      <form>
		<input type = "button" name = "testJS" value = "BACK" onclick="btnOnClk()">
      </form>
   </body>
</html>