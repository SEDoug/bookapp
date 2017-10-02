<?php
//connect to the database
$mysqli = NEW MySQLi('localhost', 'root', '123456', 'books');

//query the database
$resultSet = $mysqli->query("SELECT * FROM books");

//count the returned rows
if($resultSet->num_rows != 0){
  while($rows = $resultSet->fetch_assoc())
  {

    $author_details = $rows['author_details'];
    $title = $rows['title'];
    $isbn = $rows['isbn'];
    $publisher = $rows['publisher'];
    $date_published = $rows['date_published'];
    $pages = $rows['pages'];

    echo "<p>Author: $author_details<br />Title: $title<br />ISBN: $isbn<br />Publisher: $publisher<br />Date Published: $date_published<br />
    Pages: $pages<br /></p>";

//     echo "<p>Author: $author_details"<br /></p>";

//     echo "<td>".$title['title']."</td>";
//     echo "<th>".$book['isbn']."</th>";
//     echo "<th>".$book['publisher']."</th>";
//     echo "<th>".$book['date_published']."</th>";
//     echo "<th>".$book['pages']."</th>";
//     echo "<th>".$book['list_price']."</th>";
//     echo "<th>".$book['format']."</th>";
//     echo "<th>".$book['date_added']."</th>";
//     echo "<t>".$book['book_uuid']."</th>";
//     echo "</tr>";

  }
//Display the results
}else{
    echo "No results.";
}
?>
