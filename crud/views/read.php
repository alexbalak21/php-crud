<h3>USERS</h3>
<table>
<tr>
<th>id</th>
<th>username</th>
<th>password</th>
<th>email</th>
<th>age</th>
<th>img</th>
<th>date</th>
</tr>

<?php 
$data = getAll();

foreach($data as $user){
    echo "<tr>";
    foreach ($user as $col)
        echo "<td>", $col, "</td>";
    echo "</tr>";   
}

?>


</table>


<?php ?>