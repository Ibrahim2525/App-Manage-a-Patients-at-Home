 <?php
session_start();
if(!$_SESSION['patient']){
    header("Location: PatientLogin.php");  
}else{

}
?>




<!DOCTYPE html>
<html>
    <head>
        <title>Total Oriantation</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">
    </head>
    <body>
        <?php
        include("PatientsHeader.php");
             include("../include/Connection.php");
             //session_start();
         
         ?>
         <div class="container-fluid">
             <div class="col-md-12">
                 <div class="row">
                     <div class="col-md-2" style="margin-left: -30px">
                        <?php
                        include("PatientSidenav.php");
                         ?>
                    
                    </div>
                    <div class="col-md-10">
                        <h3 class="text-center my-2" style="padding-top: 200px; color: grey; font-size: 20px; padding-bottom: 20px;">Total Orientation</h3>
                        <?php
                        //$pa =  $_SESSION['consultationP'];
                        $id_p =  $_SESSION['patient_id'];
                        $query =  "SELECT * FROM hospitalization , doctors where id_pat='$id_p' and doctors.id=hospitalization.id_doc" ;
                        
                        $res = mysqli_query($conn,$query);
                        //$row = mysqli_fetch_array($res);

                        $output="";
                        $output .= "

                        <table class='table table-bordered border border-dark' style='font-size: 20px;'>
                            <tr>
                                
                                <td class='border border-dark'>Name Doctor</td>
                                <td class='border border-dark'>Last-Name Doctor</td>
                                <td class='border border-dark'>Hospitalization</td>
                                <td class='border border-dark'>Date Hospitalization</td>
                                
                                <td>Action</td>
                                
                            </tr>
                        </table>
                        ";

                        if(mysqli_num_rows($res) < 1) {

                            $output .="
                            <table class='table table-bordered'>
                                <tr>
                                    <td class='text-center' colspan='5' style='font-size: 20px; color: red;'>No hospitalization Yet.</td>
                                </tr>
                            </table>     
                            ";
                        }

                        while($row = mysqli_fetch_array($res)) {
                            $output .="
                            
                            <table class='table table-bordered border border-dark my-4' style='font-size: 20px;'>
                                <tr> 
                                    
                                    <td class='border border-dark'>".$row['Name']."</td>
                                    <td class='border border-dark'>".$row['LastName']."</td>
                                    <td class='border border-dark'>".$row['hospitalization']."</td>
                                    <td class='border border-dark'>".$row['date_hospitalization']."</td>
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