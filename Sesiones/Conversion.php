<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/Styles.css">   
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <header>
                <h1>Conversor de unidades</h1>
            </header>
        </div>
    </div>
</div>
<div class="nav">   
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <ul class="nav nav-tabs">                
                <li role="presentation"><a href="CDT.php">CDT</a></li>   
                <li role="presentation" class="active"><a href="prestamos.php">Prestamos</a></li>             
                </ul>
            </div>
        </div>
    </div>
</div>
<section>
<div id="sesion">
 <form action="Conversion.php" method="POST">
          <?php
            $medida1 = $_POST["txtMedida1"];
            $medida2 = $_POST["txtMedida2"];
            $Value = $_POST["InputValue"];
            

            if($medida1 == "Milimetros" && $medida2 == "Centimetros") {  
                      $Convert = $Value/10.000;
            }else if($medida1 == "Milimetros" && $medida2 == "Metros"){
                      $Convert = $Value/1000.0;
            }else if($medida1 == "Milimetros" && $medida2 == "Kilometros"){
                     $Convert = $Value/1000000;
            }else if($medida1 == "Centimetros" && $medida2 == "Milimetros"){
                     $Convert = $Value/0.10000;
            }else if($medida1 == "Centimetros" && $medida2 == "Metros"){
                    $Convert = $Value/100;                   
            }else if($medida1 == "Centimetros" && $medida2 == "Kilometros"){
                    $Convert = $Value/100000;
            }else if($medida1 == "Metros" && $medida2 == "Centimetros"){
                     $Convert = $Value/0.010000;
            }else if($medida1 == "Metros" && $medida2 == "Milimetros"){
                     $Convert = $Value/0.0010000;
            }else if($medida1 == "Metros" && $medida2 == "Kilometros"){
                     $Convert = $Value/1000.0;
            }else if($medida1 == "Kilometros" && $medida2 == "Milimetros"){
                     $Convert = $Value/0.0000010000;
            }else if($medida1 == "Kilometros" && $medida2 == "Centimetros"){
                    $Convert = $Value/0.000010000;
            }else if($medida1 == "Kilometros" && $medida2 == "Metros"){
                    $Convert = $Value/0.0010000;
            }
            ?>
    <div class="container-fluid">
    <div class="row">
             
        <div class="col-sm-5">
          <label for="InputValue">Ingrese la medida que desea convertir</label>
          <input type="number" name="InputValue">
          <input type="submit" class="btn btn-primary"value="Convertir" name="btnConvertir">                                
        </div> 
        <div class="col-sm-4 ">
            <select class="selectpicker" name="txtMedida1">
                    <option  value="Metros" >Metros</option>
                    <option  value="Centimetros" >Centimetros</option>
                    <option  value="Kilometros" >Kilometros</option>
                    <option  value="Milimetros">Milimetros</option>
            </select>  
            <select class="selectpicker" name="txtMedida2">
                    <option  value="Metros" >Metros</option>
                    <option  value="Centimetros" >Centimetros</option>
                    <option  value="Kilometros" >Kilometros</option>
                    <option  value="Milimetros">Milimetros</option>
            </select>       </div>           
        <div class="col-sm-3">  
          <textarea cols="35" rows="1"><?php echo "$Value $medida1 son $Convert $medida2";?></textarea>        
        </div>
     </div>
   </div>   
  </form>
 </div>
</section>       

 <script src="js/jquery-3.1.1.js"></script>
 <script src="js/bootstrap.js" ></script>
<!--<section>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Small modal</button>
        
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <h4>Texto de la ventana</h4>
            <p>Mas texto en la ventana.</p>                
        </div>
        <div class="modal-footer">
            <a href="index.html" class="btn btn-success">Guardar</a>
            <a href="#" data-dismiss="modal" class="btn">Cerrar</a>
        </div>
    </div>
  </div>
</div>
</section> !-->
   
</body>
</html>