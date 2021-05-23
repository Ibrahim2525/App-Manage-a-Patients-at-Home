<?php
session_start();
if(!$_SESSION['infirmier']){
    header("Location: infirmierLogin.php");  
}else{

}
?>




<!DOCTYPE html>
<html>
    <head>
        <title>Total Request Care</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">
    </head>
    <body>
        <?php
        include("infirmierHeader.php");
             include("../include/Connection.php");
             //session_start();
         
         ?>
         <div class="container-fluid">
             <div class="col-md-12">
                 <div class="row">
                     <div class="col-md-2" style="margin-left: -30px">
                        <?php
                        include("infirmierSidenav.php");
                         ?>
                    
                    </div>
                    <div class="col-md-10">
                        <h3 class="text-center my-2" style="padding-top: 200px; color: grey; font-size: 20px; padding-bottom: 20px;">Total Request Care</h3>
                        <?php
                        //$pa =  $_SESSION['consultationP'];
                        $id_p =  $_SESSION['patient_id'];
                        $query =  "SELECT * FROM requestcare , patientsregister , doctors where id_pat='$id_p' AND patientsregister.id=requestcare.id_pat " ;
                    
                        $res = mysqli_query($conn,$query);
                        //$row = mysqli_fetch_array($res);

                        $output="";
                        $output .= "

                        
                        ";

                        if(mysqli_num_rows($res) < 1) {

                            $output .="
                            <table class='table table-bordered'>
                                <tr>
                                    <td class='text-center' colspan='5' style='font-size: 20px; color: red;'>No Request Care Yet.</td>
                                </tr>
                            </table>     
                            ";
                        }

                        while($row = mysqli_fetch_array($res)) {
                            $output .="
                            
                            <table class='table table-bordered border border-dark my-4' style='font-size: 20px;'>
                                <tr> 
                                    <td class='border border-dark'>Name Patient</td>
                                    <td class='border border-dark'>".$row['firstname']."</td>
                                </tr>

                                <tr>
                                    <td class='border border-dark'>Last-Name Patient</td>
                                    <td class='border border-dark'>".$row['surname']."</td>

                                </tr>

                                <tr>
                                    <td class='border border-dark'>Phone</td>
                                    <td class='border border-dark'>".$row['phone']."</td>

                                </tr>

                            <tr>
                                <td class='border border-dark'>Gender</td>
                                <td class='border border-dark'>".$row['gender']."</td>

                            </tr>
                             

                                <tr>
                                    <td class='border border-dark'>Request Care</td>
                                    <td class='border border-dark'>".$row['description_rc']."</td>
                                </tr>

                                <tr>
                                    <td class='border border-dark'>Date Of Care</td>
                                    <td class='border border-dark'>".$row['date_care']."</td>
                                </tr>

                             
                                
                                
                            </table>
                            
                            
                            ";
                        }

                       $output .="</tr></table>";

                        echo $output;
                        
                        ?>
                    </div>
                 </div>
             </div>
         </div>
    </body>
</html>