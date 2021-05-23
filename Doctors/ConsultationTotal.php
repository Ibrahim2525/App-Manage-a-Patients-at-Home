<?php
session_start();
if(!$_SESSION['doctor']){
    header("Location: DoctorLogin.php");  
}else{

}
?>




<!DOCTYPE html>
<html>
    <head>
        <title>Total Consultation</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">
    </head>
    <body>
        <?php
        include("Doctorsheader.php");
             include("../include/Connection.php");
             //session_start();
         
         ?>
         <div class="container-fluid">
             <div class="col-md-12">
                 <div class="row">
                     <div class="col-md-2" style="margin-left: -30px">
                        <?php
                        include("DoctorsSidenav.php");
                        ?>
                    
                    </div>
                    <div class="col-md-10">
                        <h3 class="text-center my-2" style="padding-top: 200px; color: grey; font-size: 20px; padding-bottom: 20px;">Total Consultation</h3>
                        <?php
                        //$pa =  $_SESSION['consultationP'];
                        $id_d =  $_SESSION['doctor_id'];
                        $query =  "SELECT * FROM consult ,  patientsregister where id_d='$id_d'  AND patientsregister.id=consult.id_p" ;
                        
                        $res = mysqli_query($conn,$query);
                        //$row = mysqli_fetch_array($res);

                        $output="";
                        $output .= "

                        <table class='table table-bordered border border-dark' style='font-size: 20px;'>
                            <tr>
                                <td class='border border-dark'>ID</td>
                                <td class='border border-dark'>Firstnname</td>
                                <td class='border border-dark'>Surname</td>
                                <td class='border border-dark'>Gender</td>
                                <td class='border border-dark'>Phone</td>
                                <td class='border border-dark'>Symptoms</td>
                                <td class='border border-dark'>Date Booked</td>
                                
                                <td>Action</td>
                                
                            </tr>
                        </table>
                        ";

                        if(mysqli_num_rows($res) < 1) {

                            $output .="
                            <table class='table table-bordered'>
                                <tr>
                                    <td class='text-center' colspan='9' style='font-size: 20px; color: red;'>No Consultation Yet.</td>
                                </tr>
                            </table>     
                            ";
                        }

                        while($row = mysqli_fetch_array($res)) {
                            $output .="
                            
                            <table class='table table-bordered border border-dark my-4' style='font-size: 20px;'>
                                <tr> 
                                    <td class='border border-dark'>".$row['id']."</td>
                                    <td class='border border-dark'>".$row['firstname']."</td>
                                    <td class='border border-dark'>".$row['surname']."</td>
                                    <td class='border border-dark'>".$row['gender']."</td>
                                    <td class='border border-dark'>".$row['phone']."</td>
                                    <td class='border border-dark'>".$row['symptoms']."</td>
                                    <td class='border border-dark'>".$row['date_consult']."</td>
                                    <td class='border border-dark'><button>decharge</button></td>
                                   
                                    </td>
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