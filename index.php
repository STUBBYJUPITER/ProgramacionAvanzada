<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canvas</title>
    <style type="text/css">
        canvas{
            background-color: red;
        }
    </style>
</head>
<body>
    <h1>practica de programacion avanzada</h1>
    <canvas id="canvas" width="500" height="500">
        <script type="text/javascript">

            // para que el navegador soporte canvas
            var canvas = document.getElementById("canvas");
            var ctx = canvas.getContext('2d');

            ctx.fillStyle = 'black';
            ctx.fillRect(10, 10, 100, 100);
            //cuadro completo usando transparencia
            ctx.fillStyle = 'rgba(0, 0, 255, 0.5)';
            ctx.fillRect(90, 90, 100, 100);
            ctx.fillStyle = 'rgba(20, 20, 200, 0.5)';
            ctx.fillRect(180, 180, 100, 100);

            //contorno de un cuadrado
            // ctx.strokeStyle="black";
            //ctx.strokeRect(10,10,200,200);

            //ctx.strokeStyle="green";
            //ctx.strokeRect(30,30,200,200);

           //stroke = contorno de algo
           //lineas

           //donde empieza
           ctx.moveTo(0,0);
           //donde termina
           ctx.lineTo(500,500);
           //traza la linea
           ctx.stroke();

/*
           ctx.moveTo(0,0);
           ctx.lineTo(400,20);
           ctx.lineTo(150,150);
           ctx.stroke();
           ctx.fillStyle = 'rgba(150, 150, 100, 0.5)';
           ctx.fill();
           

          
           ctx.beginPath();
           ctx.fillStyle = 'green';
           ctx.arc(100,390,100,0,2*Math.PI);
           ctx.fill();

           ctx.beginPath();
           ctx.fillStyle = 'purple';
           ctx.arc(390,390,100,0,2*Math.PI);
           ctx.fill();
*/
           //texto
           ctx.beginPath();
           ctx.font="30px Arial";
           ctx.fillText("hola que hace",200,100);

           ctx.strokeText("nada",340,140);


        </script>
    </canvas>
</body>
</html>