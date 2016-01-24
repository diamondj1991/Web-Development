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

         // build INSERT query
         $query = "INSERT INTO delicounter " .
                  "( name, food_type, brand, amount) " .
                  "VALUES ( '$name', '$foodType', '$brand', '$amount')";
				  
		// build SELECT query
         $query2 = "SELECT * FROM delicounter";
                  

         // Connect to MySQL
         if ( !( $database = mysql_connect( "localhost",
            "root", "" ) ) )                      
            die( "Could not connect to database </body></html>" );
   
         // open deli database
         if ( !mysql_select_db( "deli", $database ) )
            die( "Could not open captain database </body></html>" );

         //insert user input in to delicounter table
         if ( !( $result = mysql_query( $query, $database ) ) ) 
         {
            print( "<p>Could not execute INSERT query!</p>" );
            die( mysql_error() . "</body></html>" );
         } 
		 
		 //query the delicounter table with SELECT, $tDisplay used to build HTML table for user view
		 if ( !( $tDisplay = mysql_query( $query2, $database ) ) ) 
         {
            print( "<p>Could not execute SELECT query!</p>" );
            die( mysql_error() . "</body></html>" );
         } // end if

         mysql_close( $database );
      ?>
      <table>
         <?php
            // fetch each record in result set
            while ( $row = mysql_fetch_row( $tDisplay ) )
            {
               // build table to display results
               print( "<tr>" );

               foreach ( $row as $value ) 
                  print( "<td>$value</td>" );

               print( "</tr>" );
            } 
         ?>
      </table>
      <form>
		<input type = "button" name = "testJS" value = "BACK" onclick="btnOnClk()">
      </form>
   </body>
</html>