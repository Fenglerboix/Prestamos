<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prestamos</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/Styles.css">
    <link rel="stylesheet" href="css/sweetalert.css">
    <script src="js/sweetalert.min.js"></script>
    <script src="js/jquery-3.1.1.js"></script>    
       <script> 
            function Error(name,tipoInver){
                swal({
                title: "Estimado cliente "+name,
                text:  "El prestamo de tipo: "+tipoInver+" no aplica le sugerimos revisar las condiciones para realizar prestamos",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "¿Quieres intentarlo de nuevo?",
                closeOnConfirm: false
                },
                function(){
                swal("!!", "Su peticion fue procesada satisfactoriamente.", "success");
                });
            }           
             
              function TipoValue(){
              if(document.getElementById('Prest').value == 'Hipotecario'){
                  document.getElementById('tipo').innerHTML= "Ingrese el valor del avaluo";
               }else{
                 
                  document.getElementById('tipo').innerHTML= "¿Cuantas personas tiene a cargo?";
               }
              }            
     </script>
</head>
<body>
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
        <header>
            <h1>Prestamos </h1>
        </header>
      </div>
  </div>
</div>
<section>

<div class="container-fluid">
    <div class="row">
       <div class="col-sm-4">
           <ul class="nav nav-pills nav-stacked">
                <li role="presentation" class="active"><a href="CDT.php">CDT</a></li>
                <li role="presentation"><a href="Conversion.php">Conversor</a></li>                
          </ul>
          <h2>Condiciones</h2>
          <h3>Libre Inversion</h2>
          <ol>
            <li>El valor minimo solicitado debe ser de 2'000.000 de pesos y maximo de 100'000.000 de pesos.</li>
            <li>Tasa de interes mensual hasta 50'000.000 de pesos son de: <br> 1,7%<br> y para mas de 50'000.000 de pesos. <br>1,45%</li>
            <li>Minimo de ingresos mas de 4 salarios minimos.</li>
            <li>Tener menos de cuatro personas a cargo.</li>
            <li>Plazo minimo de la deuda 15 años.</li>            
          </ol>
          <h3>Hipotecario</h2><script src="js/sweetalert.min.js"></script>
          <ol>
            <li>El valor minimo solicitado debe ser de 30'000.000 de pesos y maximo de 200'000.000 de pesos.</li>
            <li>Tasa de interes mensual hasta 100'000.000 de pesos son de: <br> 1,35%<br> y para mas de 100'000.000 de pesos <br>1,15%</li>
            <li>Minimo de ingresos mas de 4 salarios minimos.</li>
            <li>El avaluo de la propiedad debe ser mayor o igual al prestamo.</li>
            <li>Plazo minimo de la deuda 15 años.</li>
          </ol>
           <h5>TENGA EN CUENTA: <br>Para ambos prestamos se cobra un seguro a cada cuota del 0,015% sobre el valor del credito.</h4>  
      </div> 
     
      <div class="col-sm-2">
  <form action="prestamos.php" method="POST">
         <label for="txtNombreApellido">Datos personales</label><br>
         <input id="names" type="text" name="txtNombreApellido" placeholder="Nombre y Apellidos" required><br>
         <label for="" id="tipo">¿Cuantas personas tiene a cargo?</label><br>
         <input type="number" name="nroPerCargo" required><br>
         <label for="">valor prestamo</label><br>
         <input type="number" name="nroValorPrestamo" required><br>
         <input type="submit" id="btn" class="btn btn-primary" name="btnProcesar" value="Procesar Solicitud"> 
          
      </div>
      <div class="col-sm-5">
        <label for="" >Seleccione el tipo de prestamo</label><br>
            <select name="slcTipoPrestamo" id="Prest" onclick="TipoValue()">
                <option>Libre Inversion</option>     
                <option>Hipotecario</option>         
            </select><br>               
              
            <label for="">¿Cuanto suman sus ingresos mensuales?</label><br>
            <input type="number" name="IngresosMensuales" required><br>
            <label for="">Plazo en años</label><br>
            <input type="number" name="PlazoAnos"><br><br> 
    <?php  
    
      /*define ("SEGURO","5750");
      $suma = array(85000,78555,72000,65334,58554,51659,44647,37516,30264,22888,15387,7758);

      for($i=0;$i<12;$i++){
          $acumula = $acumula+$suma[$i];
          $resultado = $acumula/12;
      }
      print($resultado);*/
      $ValorPrestamo = $_POST["nroValorPrestamo"];
      $TipoPrestamo = $_POST["slcTipoPrestamo"];
      $Ingresos = $_POST['IngresosMensuales'];
      $PersonasCarg = $_POST['nroPerCargo'];
      $Cliente = $_POST["txtNombreApellido"];
      $PlazoMax = $_POST["PlazoAnos"];
      define ("SALARIOMINIMO","737717");
      define("YEAR","12");
      $meses = $PlazoMax*YEAR;
      $Seguro = $ValorPrestamo*0.00115;
     
     
     
      if($ValorPrestamo < 2000000 && $TipoPrestamo == "Libre Inversion" || $ValorPrestamo>100000000  && $TipoPrestamo == "Libre Inversion"){ 
        echo '<script>alert("Mistake")</script>';               
        //echo '<script>Error("'.$Cliente.'","'.$TipoPrestamo.'");</script>';
      }else if($ValorPrestamo>50000000 && $ValorPrestamo<= 100000000 && $TipoPrestamo == "Libre Inversion"){
               $TasaInteres = $ValorPrestamo*0.0145;
               $interes = 0.0145;
                 if($Ingresos>(SALARIOMINIMO*4) && $PersonasCarg<4 && $PlazoMax<=15){                     
                  print '<script>swal("Señor(a) '.$Cliente.' \nsu prestamo fue aprobado");</script>';
                  $CuotaFija = (0.0145*$ValorPrestamo)/(1-(1+0.0145)**(-$meses));
                 }else{                      
                       print '<script>swal("Señor(a) '.$Cliente.'\nsu prestamo no fue aprobado\n lo sentimos tenga en cuenta que el plazo minimo \npara prestamos de libre inversion son de 15 años");</script>';
                    }  

           }else if($ValorPrestamo<=50000000 && $TipoPrestamo == "Libre Inversion"){
              $TasaInteres = $ValorPrestamo*0.017;
              $interes = 0.017;
                  if($Ingresos>(SALARIOMINIMO*4) && $PersonasCarg<4 && $TipoPrestamo == "Libre Inversion" && $PlazoMax<=15){                  
                    $CuotaFija = (0.017*$ValorPrestamo)/(1-(1+0.017)**(-$meses));                                       
                    print '<script>swal("¡Bien!","Señor(a) '.$Cliente.' \nsu prestamo fue aprobado","success");</script>';
                  }else{
                        echo '<script>Error("'.$Cliente.'","'.$TipoPrestamo.'");</script>';                         
                    }               
           }
      
      //Prestamos hipotecarios
        if($ValorPrestamo < 30000000 && $TipoPrestamo == "Hipotecario" || $ValorPrestamo > 200000000 && $TipoPrestamo == "Hipotecario"){
            echo '<script>Error("'.$Cliente.'","'.$TipoPrestamo.'");</script>';
        }else{          
           if($ValorPrestamo>30000000 && $ValorPrestamo <= 100000000 && $TipoPrestamo == "Hipotecario"){
               $TasaInteres = $ValorPrestamo*0.0135;
               $interes = 0.0135;
                 if($Ingresos>(SALARIOMINIMO*4) && $PersonasCarg>=$ValorPrestamo && $PlazoMax<=15){
                     $CuotaFija = (0.0135*$ValorPrestamo)/(1-(1+0.0135)**(-$meses));
                  print '<script>swal("Señor(a) '.$Cliente.' \nsu prestamo fue aprobado");</script>';
                 }else{
                       echo '<script>Error("'.$Cliente.'","'.$TipoPrestamo.'");</script>';
                    }             
           }else if($ValorPrestamo>=100000000 && $ValorPrestamo<=200000000 && $TipoPrestamo == "Hipotecario"){
              $TasaInteres = $ValorPrestamo*0.0115;
              $interes = 0.0115;
                  if($Ingresos>(SALARIOMINIMO*4) && $PersonasCarg>=$ValorPrestamo && $PlazoMax<=15){
                      $CuotaFija = (0.0115*$ValorPrestamo)/(1-(1+0.0115)**(-$meses));
                  print '<script>swal("Señor(a) '.$Cliente.' \nsu prestamo fue aprobado");</script>';
                  }else{
                        echo '<script>Error("'.$Cliente.'","'.$TipoPrestamo.'");</script>';
                    }               
           }   
       }
        $ByCout = $CuotaFija+$Seguro;
    ?>
    </form>
     <table>
           <tbody>
            <tr>
             <td colspan="6">Credito Libre Inversion -Valor Solicitado: <?php $prestamo = number_format($ValorPrestamo);echo" $ $prestamo";?></td>
            </tr>
            <tr>
             <td colspan="6">Valor cuota fija mensual sin seguro: <?php $cuota = number_format($CuotaFija);echo" $ $cuota";?> </td>
            </tr>
            <tr>
             <td colspan="6">PLAN DE PAGOS A<?php echo " $PlazoMax ";?> AÑO(S)</td>
            </tr>
            <tr> 
                <td><strong>Cuota</strong></td>
                <td><strong>Valor interes</strong></td>
                <td><strong>Valor Seguro</strong></td>
                <td><strong>Abono a Capital</strong></td>
                <td><strong>Valor a pagar</strong></td>
                <td><strong>Saldo</strong></td>
            </tr>            
                      <?php                
                        
                        for($i=1;$i<=$meses;$i++){
                        if($i == 1){
                            echo"<tr>";
                                $AbonoCapital = $ByCout-($TasaInteres+$Seguro);                                
                                $saldoInicial=$ValorPrestamo-$AbonoCapital;
                                ##$saldoTotal = $saldoInicial-$ByCout;                           
                                $moneyTasa = number_format($TasaInteres);
                                $moneySeguro =number_format($Seguro);
                                $moneyAbono = number_format($AbonoCapital);
                                $moneyCuota = number_format($ByCout);
                                $moneysaldoInicial = number_format($saldoInicial);
                                echo "<td>$i</td>";
                                echo "<td>$moneyTasa</td>";
                                echo "<td>$moneySeguro</td>";
                                echo "<td>$moneyAbono</td>";
                                echo "<td>$moneyCuota</td>";
                                echo "<td>$moneysaldoInicial</td>";
                                
                            echo"</tr>";
                            }else{ 
                                $intereses = $saldoInicial*$interes;
                                $AbonoCapital = $ByCout-($intereses+$Seguro);
                                $saldoInicial -= $AbonoCapital;                               
                                
                                $moneyTasa = number_format($intereses);
                                $moneySeguro =number_format($Seguro);
                                $moneyAbono = number_format($AbonoCapital);
                                $moneyCuota = number_format($ByCout);
                                $moneysaldoInicial = number_format($saldoInicial);
                                echo"<tr>";
                                    echo "<td>$i</td>";
                                    echo "<td>$moneyTasa</td>";
                                    echo "<td>$moneySeguro</td>";
                                    echo "<td>$moneyAbono</td>";
                                    echo "<td>$moneyCuota</td>";
                                    echo "<td>$moneysaldoInicial</td>";
                                echo"</tr>";
                            }
                           
                        }                
                    ?>                           
             </tbody>
         </table> 
      </div>        
    </div>
  </div>               
 
</section>
</body>
</html>