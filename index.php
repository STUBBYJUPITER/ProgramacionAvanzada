<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canvas</title>
    <style type="text/css">
        canvas{
            background-color: silver;
        }
    </style>
</head>
<body>
    <h1>practica de programacion avanzada</h1>
    <canvas id="canvas" width="500" height="500">
        <img src="wolf.png" id="imagen" width="40" height="40">
        <script type="text/javascript">

            // para que el navegador soporte canvas
            var canvas = document.getElementById("canvas");
            var ctx = canvas.getContext('2d');
            var color="rgb(0,0,0)";
            var fig="arc";

           

            var img=document.getElementById("imagen");
            ctx.drawImage(img,20,50);

    
            canvas.addEventListener('click',function(e){
                console.log(e);
                ctx.fillStyle = color;
                if(fig=="arc"){
                    ctx.beginPath();
                    ctx.arc(e.offsetX-5,e.offsetY-5,50,0,2*Math.PI);
                    ctx.strokeStyle="black";
                    
                }else{
                    ctx.beginPath();
                    ctx.fillRect(e.offsetX-20,e.offsetY-20,50,50);
                    
                }
                ctx.fill();
                ctx.stroke();

            });
    
    canvas.addEventListener('mouseover',function(e){
           
            color=random_rgba();
          
        });

    canvas.addEventListener('mouseout',function(e){
           
            fig=(fig=="arc")?"rec":"arc";
          
        });
   

    function random_rgba() {
    var o = Math.round, r = Math.random, s = 255;
    return 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + r().toFixed(1) + ')';
    }



        </script>
    </canvas>
</body>
</html>