<!DOCTYPE html>
<html>
    <head>
        <title>Check Patient Consultation</title>
    </head>
    <body>
        <?php
        include("Doctorsheader.php");
             include("../include/Connection.php");
             session_start();
         
         ?>
         <div class="container-fluid">
             <div class="col-md-12">
                 <div class="row">
                     <div class="col-md-2" style="margin-left: -30px;">
                        <?php
                        include("DoctorsSidenav.php");
                         ?>
                    </div>
                    <div class="col-md-10">
                        <h3 class="text-center my-2">Total Consultation</h3>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td colspan="2" class="text-center">Consultation Details</td>
                                        </tr>
                                        <tr>
                                            
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6"></div>
                            </div>
                        </div>
                    </div>
                 </div>
             </div>
         </div>
    </body>
</html>