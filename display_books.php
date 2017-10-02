<?php

//make a connection to the db
mysqli_connect('localhost', 'root', '123456');

//select database
mysqli_select_db('books', 'search_books');

$sql="SELECT * FROM books";

$records=mysqli_query($sql, $search_sql);

?>

<html>

<head>
<title>Book Database Display Page</title>
</head>

<body>

<table width="900" border="1" cellpadding="1" cellspacing="1">

<tr>
<th>author_details</th>
<th>title</th>
<th>isbn</th>
<th>publisher</th>
<th>date_published</th>
<th>pages</th>
<th>list_price</th>
<th>format</th>
<th>date_added</th>
<th>book_uuid</th>
</tr>

<?php

//this is a loop that loops the database

 while($book=mysql_fetch_assoc($records)){

   echo "<tr>";
   echo"<td>".$book['author_details']."</td>";
   echo"<td>".$book['title']."</td>";
   echo"<td>".$book['isbn']."</td>";
   echo"<td>".$book['publisher']."</td>";
   echo"<td>".$book['date_published']."</td>";
   echo"<td>".$book['pages']."</td>";
   echo"<td>".$book['list_price']."</td>";
   echo"<td>".$book['format']."</td>";
   echo"<td>".$book['date_added']."</td>";
   echo"<td>".$book['book_uuid']."</td>";
   echo "</tr>";



 }//end while

 ?>

</body>
</html>
