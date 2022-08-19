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

           var cv=null;
           var ctx=null;
           var super_x=240,super_y=240;
           var player1=null;

            function start(){
             canvas = document.getElementById("canvas");
             ctx = canvas.getContext('2d');
             player1=new Cuadrado(super_x,super_y,50,50,"red");
             paint();

            }
            function paint(){
                window.requestAnimationFrame(paint);
                ctx.fillStyle="black";
                ctx.fillRect(0,0,500,500);
                
                player1.c=random_rgba();
                player1.dibujar(ctx);

                /*
                ctx.fillStyle=random_rgba();
                ctx.fillRect(super_x,super_y,50,50);
                ctx.strokeRect(super_x,super_y,50,50);
                */
               update();
            };

            function update(){
              player1.x+=10;
                player1.y+=10;
                if( player1.x>500){
                    player1.x=0;
                }
                if(player1.y>500){
                    player1.y=0;
                }

            };

            window.addEventListener('load',start)

            window.requestAnimationFrame = (function () {
                return window.requestAnimationFrame ||
                window.webkitRequestAnimationFrame ||
                window.mozRequestAnimationFrame ||
                function (callback) {
                window.setTimeout(callback, 17);
                    };
            }());

            function random_rgba() {
                var o = Math.round, r = Math.random, s = 255;
                return 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + r().toFixed(1) + ')';
                };

            function Cuadrado(x,y,w,h,c){
                this.x=x;
                this.y=y;
                this.w=w;
                this.h=h;
                this.c=c;
                this.dibujar=function(ctx){
                    ctx.fillStyle=this.c;
    
                    ctx.fillRect(this.x,this.y,this.w,this.h);
                    ctx.strokeRect(this.x,this.y,this.w,this.h);
                }
            }

           

           

   



        </script>
    </canvas>
</body>
</html>