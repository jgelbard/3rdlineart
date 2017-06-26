<html>
   
   <head>
      <title>Paging Using PHP</title>
   </head>
   
   <body>
    <?php
include('config.php'); //include of db config file
include ('pagnation.php'); //include of paginat page
$per_page = 5; // number of results to show per page
$result = mysql_query("SELECT * FROM countries");
$total_results = mysql_num_rows($result);
$total_pages = ceil($total_results / $per_page);

if (!isset($_GET['page']))
{
$show_page=$page=1; 
}
//total pages we going to have
//-------------if page is setcheck------------------//
if (isset($_GET['page'])) {
$show_page = $_GET['page']; //current page
if ($show_page > 0 && $show_page <= $total_pages) {
$start = ($show_page - 1) * $per_page;
$end = $start + $per_page;
} else {
// error - show first set of results
$start = 0;
$end = $per_page;
}
} else {
// if page isn't set, show first set of results
$start = 0;
$end = $per_page;
}

// display pagination
if (!isset($_GET['page']))
{
$page=1; 
}
else
{
$page = intval($_GET['page']); 
}

$tpages=$total_pages;
if ($page <= 0)
$page = 1;

?>
       
       <?php
$reload = $_SERVER['PHP_SELF'] . "?tpages=" . $tpages;
echo '<div class="pagination"><ul>';
if ($total_pages > 1) {
echo paginate($reload, $show_page, $total_pages);
}
echo "</ul></div>";
// display data in table
echo "<table class='table table-bordered'>";
echo "<thead><tr><th>country code</th> <th>Country Name</th></tr></thead>";
// loop through results of database query, displaying them in the table
for ($i = $start; $i < $end; $i++) {
// make sure that PHP doesn't try to show results that don't exist
if ($i == $total_results) {
break;
}
// echo out the contents of each row into a table
echo "<tr>";
echo '<td>' . mysql_result($result, $i, 'ccode') . '</td>';
echo '<td>' . mysql_result($result, $i, 'country') . '</td>';
echo "</tr>";
}
// close table>
echo "</table>";
// pagination
echo '<div class="pagination"><ul>';
if ($total_pages > 1) {
echo paginate($reload, $show_page, $total_pages);
}
echo "</ul></div>";
?>
    </body>
</html>