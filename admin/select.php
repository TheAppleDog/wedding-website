 <?php  
 if(isset($_POST["id"]))
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "wedding_planner");  
      $query = "SELECT * FROM tbl_features WHERE category_id = {$_POST['id']}";
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
            <table class="table table-bordered">
            <tr>  
              <th ><label>Title</label></th>                
            </tr>';  
            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_array($result)) {  
                   $output .= '  
                        <tr>  
                             <td><label>'.$row["title"].'</label></td>                           
                        </tr>';  
              }  
            } else {
                    $output .= '  
                        <tr>  
                             <td colspan="2" align="center">No Feature Yet!</td>  
                        </tr>';
            }
      $output .= '</table></div>';  
      echo $output;  
 }  
 ?>
 
