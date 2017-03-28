<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/Styles.css">
    <title>Document</title>
</head>
<body>
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
        <header>
            <h1>Simulacion de rendimientos CDT</h1>
        </header>
      </div>
  </div>
</div>
<section>
 <div class="container-fluid">
    <div class="row">
       <div class="col-sm-4">
           <ul class="nav nav-pills nav-stacked">
                <li role="presentation" class="active"><a href="#">Home</a></li>
                <li role="presentation"><a href="Conversion.php">Conversor</a></li>
                <li role="presentation"><a href="prestamos.php">Prestamos</a></li>
          </ul>
        <div id="tbl">
          <table>
            <thead>
                <th>Descripcion</th>
                <th>Opcion Solicitada</th>
                <th>Opcion propuesta</th>
            </thead>
                <tbody>
                    <tr>
                        <td>Plazo de la inversion</td>
                        <td>180 dias</td>
                        <td>720 dias</td>
                    </tr>
                    <tr>
                        <td>tasa de interes</td>
                        <td>5.9 %</td>
                        <td>5.95 %</td>
                    </tr>
                    <tr>
                        <td>Rendimientos</td>
                        <td><?php $rendimientos = 50000000*.059/2; $pesos = number_format($rendimientos); echo "$ $pesos";?></td>
                        <td><?php $rendimientos = 50000000*.0595*2; $pesos = number_format($rendimientos); echo "$ $pesos";?></td>
                    </tr>
                    <tr>
                        <td>retencion en la fuente</td>
                        <td><?php $retencion = (50000000*.059/2)*0.04; $pesos = number_format($retencion); echo "$ $pesos";?> </td>
                        <td><?php $retencion = (50000000*.0595*2)*0.04; $pesos = number_format($retencion); echo "$ $pesos";?></td>
                    </tr>
                    <tr>
                        <td>Valor a pagar</td>
                          <td><?php $retencion = (50000000*.059/2)-((50000000*.059/2)*0.04); $pesos = number_format($retencion); echo "$ $pesos";?> </td>
                        <td><?php $retencion = (50000000*.0595*2)-((50000000*.0595*2)*0.04); $pesos = number_format($retencion); echo "$ $pesos";?></td>
                    </tr>                   
            </tbody>
        </table>
      </div>
        </div>
       
        <div class="col-sm-6 col-sm-offset-1">
            <form action="CDT.php" method="POST">
                <fieldset>
                    <legend>Inversion en CDT</legend>

                    <label for="txtnombres">Datos personales</label><br>
                    <input type="text" name="txtnombres" placeholder="Nombre y apellido" require><br>

                    <label for="email">E-mail</label><br>
                    <input type="email" name="email" placeholder="Ingrese correo" require><br>

                    <label for="valor">valor de la inversion</label><br>
                    <input type="number" name="valor" placeholder="Ingrese inversion" min="1000000" require><br>

                    <label for="plazo">Valor del plazo</label><br>
                    <input type="number" name="plazo" placeholder="Ingrese plazo" max="720" min="180" require><br>

                    <hr>
             <?php
              $valor = $_POST["valor"];
              $plazo = $_POST["plazo"];

              if($valor <= 20000000){
                  if($plazo<=360){
                     $taza = 5.05;
                  }else{                     
                     $taza = 5.15;
                  }
              }else{
                     if($plazo<=360){
                     $taza = 5.9;
                  }else{                     
                     $taza = 5.95;
                  }
              }

              ##echo "Valor CDT $valor <br>";
              ###echo "Tasa de interes <br>";
              ?>
                <textarea cols="60" rows="6"><?php echo "Valor CDT $valor\n";echo "Tasa de interes $taza";?></textarea><br>
                <input type="submit" value="Simular" name="enviar">
                <input type="reset" value="Limpiar" name="Borrar">
            </fieldset>
          </form>
        </div>     
    </div>
</div>
        
</section>
</body>
</html>