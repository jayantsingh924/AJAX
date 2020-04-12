<?php

$conn = mysqli_connect("localhost", "root", "", "test") or die("Connection faild.");

$sql = "SELECT * FROM students";

$result = mysqli_query($conn, $sql) or die("SQL Query failed.");



if (mysqli_num_rows($result) > 0) 
   {
	 $output = '<table class="table table-hover">
                <thead>
                  <tr class="table-primary">
                    <th scope="col" style= "width: 300px;">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col" style= "width: 200px;">Action</th>
                  </tr>
                </thead>';

           while ($row = mysqli_fetch_assoc($result)) 
                {
                  $output .= "<tbody>
                               <tr class='table-Default'>
                                 <td>{$row['id']}.</td>
                                 <td>{$row['first_name']} {$row['last_name']}</td>
                                 <td><button class='btn btn-link' id= 'delete-btn' style='color: red;' 
                                             data-id='{$row['id']}'>Delete</button></td>
                               </tr>
                             </tbody>";   
                }
                $output .= "</table>";
                mysqli_close($conn);
                echo $output;
   }
else 
   {
   	 echo 'No record found.';
   }   


?>