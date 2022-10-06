<?php
//connect to database 
$objConnect = mysqli_connect("localhost","root","")or die("can't connect to database");
$db = mysqli_select_db($objConnect, "mydb");
mysqli_query($objConnect, "SET NAMES utf8");

if($objConnect->connect_error)
{
    die("connection failed". $conn->connect_error);

}
echo "connection complete ";

//select data from table 
$sql = "SELECT InvoiceID, CustomerID, CartID FROM invoice";
$result = $objConnect->query($sql);

echo "<br>";
if ($result->num_rows > 0) {
  // head of table
 echo "<table border='2px'>";
 echo "<tr bgcolor='pink'>";   echo "<th width='200px'> ชื่อสินค้า "; echo "</th>";echo "<th> รหัสสินค้า: ";echo "</th>"; echo "<th> ราคาสินค้า"; echo "</th>";
 echo "</tr>"; 
// output data of each row
 while($row = $result->fetch_assoc()) {
    echo "<td><a href='edit.php?InvoiceID=$row[InvoiceID]'>".$row["InvoiceID"]."</td>"."</a><td>"."</a>".$row["CustomerID"]."</td>"."<td>".$row["CartID"]."</td>";
 echo "</tr>"."<br>";    

  }
  echo "</table>";
}
else {
    echo "0 results";
  }

  //menu add data to table
  echo "<br>";
  echo "<a href='insertinvoice.php'>Add New Invoice</a>";
  
  $objConnect->close();
?>