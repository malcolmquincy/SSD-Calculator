<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Seaside School District - Health Insurance Calculator</title>
        <link rel="icon" type="image/png" href="https://content.schoolinsites.com/api/documents/870c04d40a974b12a290bd63d8a72233.png" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />

        <style>

input[type='radio'] { 
     transform: scale(1.25); 
 }
        </style>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container px-4">
                <a class="navbar-brand" href="index.php">Health Insurance Calculator</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="help.php">Help</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="text-white" style="background-color: #9bddff">
            <div class="container px-4 text-center">
                <h1 class="fw-bolder">OEBB Insurance Calculation Tool</h1>
                
            </div>
        </header>
        <!-- About section-->
            
      
        <section id="about" class="pt-3">





            <div class="container ">
                <form action="index.php" method="post" >

            <div class="row justify-content-center mt-3">
                    <div class="col-lg-8">
                    <?php

if(isset($_POST['medplan']) && isset($_POST['denplan']) && isset($_POST['visplan']))
{

$med = $_POST['medplan'];
$den = $_POST['denplan'];
$vis = $_POST['visplan'];




if($med == 'med-1'){
    $med_plan = 'Moda Medical Plan 1';
    $med_price = 1687.32;
}

if($med == 'med-2'){
    $med_plan = 'Moda Medical Plan 2';
    $med_price = 1569.75;
}

if($med == 'med-3'){
    $med_plan = 'Moda Medical Plan 3';
    $med_price = 1475.69;
}

if($med == 'med-4'){
    $med_plan = 'Moda Medical Plan 4';
    $med_price = 1400.41;
}

if($med == 'med-5'){
    $med_plan = 'Moda Medical Plan 5';
    $med_price = 1294.88;
}

if($med == 'med-6'){
    $med_plan = 'Moda Medical Plan 6';
    $med_price = 1326.09;
}

if($med == 'med-7'){
    $med_plan = 'Moda Medical Plan 7';
    $med_price = 1237.63;
}

if($den == 'den-1'){
    $den_plan = 'Delta Dental Premier Plan 1 w/Ortho';
    $den_price = 159.96;
}

if($den == 'den-2'){
    $den_plan = 'Delta Dental Premier Plan 5 w/Ortho';
    $den_price = 141.17;
}

if($den == 'den-3'){
    $den_plan = 'Delta Dental Premier Plan 6 w/Ortho';
    $den_price = 99.83;
}

if($den == 'den-4'){
    $den_plan = 'Delta Dental Exclusive PPO Incentive w/Ortho';
    $den_price = 138.05;
}

if($den == 'den-5'){
    $den_plan = 'Delta Dental Exclusive PPO w/Ortho';
    $den_price = 94.37;
}

if($den == 'den-6'){
    $den_plan = 'Willamete Dental w/Ortho';
    $den_price = 119.53;
}

if($vis == 'vis-1'){
    $vis_plan = 'Moda Vision Opal';
    $vis_price = 54.72;
}

if($vis == 'vis-2'){
    $vis_plan = 'Moda Vision Pearl';
    $vis_price = 44.73;
}

if($vis == 'vis-3'){
    $vis_plan = 'Moda Vision Quartz';
    $vis_price = 31.58;
}

if($vis == 'vis-4'){
    $vis_plan = 'VSP Choice Plus';
    $vis_price = 39.71;
}

if($vis == 'vis-5'){
    $vis_plan = 'VSP Choice';
    $vis_price = 19.31;
}


$total = $med_price + $den_price + $vis_price;


if($total >= 1675){
    //they need to pay

    $your_contribution = $total - 1675;

    $show = "<tr><td></td><td>Your Contribution: </td><td>$" .number_format((float)$your_contribution, 2, '.', '') ."</td></tr>";


}else{
    //theyre going to get paid
    $rollover = 1675 - $total;

    if($med == 'med-6' OR $med == 'med-7'){
        // no section 125 
        $show = "<tr><td></td><td colspan=\"2\">Your Contribution: $0.00</td></tr>
        <tr><td></td><td>HRA OR HSA</td><td>$".number_format((float)$rollover, 2, '.', '') . "</td></tr>";
    }else{
        //roll first 41.67 to sec 125
            if ($rollover >= 41.67){
                    $hra_roll = $rollover - 41.67;

                    $show = "<tr><td></td><td colspan=\"2\">Your Contribution: $0.00</td></tr>
                <tr><td></td><td>Section 125</td><td>$41.67</td></tr>
                <tr><td></td><td>HRA OR HSA</td><td>$".number_format((float)$hra_roll, 2, '.', '')."</td></tr>";


            }else{

                $show = "<tr><td></td><td colspan=\"2\">Your Contribution: $0.00</td></tr>
                <tr><td></td><td>Section 125</td><td>$".number_format((float)$rollover, 2, '.', '') . "</td></tr>
                <tr><td></td><td>HRA OR HSA</td><td>$0.00</td></tr>";


            }


    }


}




    ?>

<div class="alert alert-success" role="alert">
                    <h2 class="alert-heading">Results</h2>

                    <table class="table table-bordered">
                       <tr><td></td><td>District Contribution</td><td><strong>$1675.00</td></tr> 
                       <tr><td>Med RX Plan</td><td><?=$med_plan?></td><td><strong>$<?=$med_price?></strong></td></tr>
                       <tr><td>Dental Plan</td><td><?=$den_plan?></td><td><strong>$<?=$den_price?></strong></td></tr>
                       <tr><td>Vision Plan</td><td><?=$vis_plan?></td><td><strong>$<?=$vis_price?></strong></td></tr>
                       <tr><td colspan="3"><hr></td></tr>
                       <tr><td></td><td>Your Plan Cost</td><td><strong>$<?=number_format((float)$total, 2, '.', '')?></strong></td></tr>
                       <?=$show?>
                    </table>



</div>




<?php
}else{
?>
                    <div class="alert alert-success" role="alert">
                    <h2 class="alert-heading">2021-2022 Details</h2>
                    <p class="lead mt-3">District Contribution: <strong>$1675.00</strong></p>
                    <p class="lead"><strong>NOTE: Moda Medical Plans 6/7 will not allow for Section 125 withholding. All leftover will be rolled into HRA/HSA.</strong></p>
                    </div>


                    <?php
}

?>


</div>
</div>


                <div class="row justify-content-center mt-5">
                    <div class="col-lg-8">
                        <h2>Medical Plan</h2>
                        <p class="lead">You must select one option</p>
                      

<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col" width="10%"></th>
      <th scope="col">Plan</th>
      <th scope="col" width="20%">Cost</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><input type="radio" id="med-1" name="medplan" value="med-1" required></th>
      <td>Moda Medical Plan 1</td>
      <td>1687.32</td>
     
    </tr>
    <tr>
      <th scope="row"><input type="radio" id="med-2" name="medplan" value="med-2" required></th>
      <td>Moda Medical Plan 2</td>
      <td>1569.75</td>
     
    </tr>
    <tr>
      <th scope="row"><input type="radio" id="med-3" name="medplan" value="med-3" required></th>
      <td>Moda Medical Plan 3</td>
      <td>1475.69</td>
     
    </tr>
    <tr>
      <th scope="row"><input type="radio" id="med-4" name="medplan" value="med-4" required></th>
      <td>Moda Medical Plan 4</td>
      <td>1400.41</td>
     
    </tr>
    <tr>
      <th scope="row"><input type="radio" id="med-5" name="medplan" value="med-5" required></th>
      <td>Moda Medical Plan 5</td>
      <td>1294.88</td>
     
    </tr>
    <tr>
      <th scope="row"><input type="radio" id="med-6" name="medplan" value="med-6" required></th>
      <td>Moda Medical Plan 6</td>
      <td>1326.09</td>
     
    </tr>
    <tr>
      <th scope="row"><input type="radio" id="med-7" name="medplan" value="med-7" required></th>
      <td>Moda Medical Plan 7</td>
      <td>1237.63</td>
     
    </tr>
  </tbody>
</table>
                    </div>



                    <div class="row justify-content-center mt-5">
                    <div class="col-lg-8">
                        <h2>Dental Plan</h2>
                        <p class="lead">You must select one option</p>
                      

<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col" width="10%"></th>
      <th scope="col">Plan</th>
      <th scope="col" width="20%">Cost</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><input type="radio" id="den-1" name="denplan" value="den-1" required></th>
      <td>Delta Dental Premier Plan 1 w/Ortho</td>
      <td>159.96</td>
     
    </tr>
    <tr>
      <th scope="row"><input type="radio" id="den-2" name="denplan" value="den-2" required></th>
      <td>Delta Dental Premier Plan 5 w/Ortho</td>
      <td>141.17</td>
     
    </tr>
    <tr>
      <th scope="row"><input type="radio" id="den-3" name="denplan" value="den-3" required></th>
      <td>Delta Dental Premier Plan 6 w/Ortho</td>
      <td>99.83</td>
     
    </tr>
    <tr>
      <th scope="row"><input type="radio" id="den-4" name="denplan" value="den-4" required></th>
      <td>Delta Dental Exclusive PPO Incentive w/Ortho</td>
      <td>138.05</td>
     
    </tr>
    <tr>
      <th scope="row"><input type="radio" id="den-5" name="denplan" value="den-5" required></th>
      <td>Delta Dental Exclusive PPO w/Ortho</td>
      <td>94.37</td>
     
    </tr>
    <tr>
      <th scope="row"><input type="radio" id="den-6" name="denplan" value="den-6" required></th>
      <td>Willamete Dental w/Ortho</td>
      <td>119.53</td>
    </tr>
    
  </tbody>
</table>
                    </div>
                </div>


                <div class="row justify-content-center mt-5">
                    <div class="col-lg-8">
                        <h2>Vision Plan</h2>
                        <p class="lead">You must select one option</p>
                      

<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col" width="10%"></th>
      <th scope="col">Plan</th>
      <th scope="col" width="20%">Cost</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><input type="radio" id="vis-1" name="visplan" value="vis-1" required></th>
      <td>Moda Vision Opal</td>
      <td>54.72</td>
     
    </tr>
    <tr>
      <th scope="row"><input type="radio" id="vis-2" name="visplan" value="vis-2" required></th>
      <td>Moda Vision Pearl</td>
      <td>44.73</td>
     
    </tr>
    <tr>
      <th scope="row"><input type="radio" id="vis-3" name="visplan" value="vis-3" required></th>
      <td>Moda Vision Quartz</td>
      <td>31.58</td>
     
    </tr>
    <tr>
      <th scope="row"><input type="radio" id="vis-4" name="visplan" value="vis-4" required></th>
      <td>VSP Choice Plus</td>
      <td>39.71</td>
     
    </tr>
    <tr>
      <th scope="row"><input type="radio" id="vis-5" name="visplan" value="vis-5" required></th>
      <td>VSP Choice</td>
      <td>19.31</td>
     
    </tr>
  
  </tbody>
</table>
                    </div>
                </div>




                </div>



                <div class="row justify-content-center">
                    <div class="col-lg-8">

                    <button class="btn btn-primary btn-lg col-12 pt-2" type="submit" id="button">Calculate</button> 

</div>
</div>



</form>
            </div>

        </section>
        <!-- Services section-->

    

     


        
       
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container px-4"><p class="m-0 text-center text-white">Seaside School District 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
