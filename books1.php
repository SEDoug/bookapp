<?php

if(isset($_POST['search']))
{
  $valueToSearch = $_POST['valueToSearch'];
  // search in all table columns
  // using concat mysql function
  $query = "SELECT * FROM `books` WHERE CONCAT(`author_details`, `title`, `isbn`, `publisher`) LIKE '%".$valueToSearch."%'";
  $search_result = filterTable($query);

}
else {
  $query = "SELECT * FROM `books`";
  $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
  $connect = mysqli_connect("localhost", "root", "123456", "books");
  $filter_Result = mysqli_query($connect, $query);
  return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
   <head>
     <title>PHP HTML TABLE DATA SEARCH</title>
     <style>
       table,tr,th,td
       {
         border: 1px solid black;
       }
      </style>
   </head>
   <body>

      <form action="books1.php" method="post">
       <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
       <input type="submit" name="search" value="Filter"><br><br>

        <table>
           <tr>
            <th>author_details</th>
            <th>title</th>
            <th>isbn</th>
            <th>publisher</th>
          </tr>

     <!-- populate table from mysql database -->
          <?php while($row = mysqli_fetch_array($search_result)):?>
          <tr>
            <td><?php echo $row['author_details'];?></td>
            <td><?php echo $row['title'];?></td>
            <td><?php echo $row['isbn'];?></td>
            <td><?php echo $row['publisher'];?></td>
          </tr>
          <?php endwhile;?>
        </table>
      </form>

   </body>
</html>

