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
           var player2=null;
           var direction="";
           var score=0;
           var pause=false;
           var velocidad;


            function start(){
             canvas = document.getElementById("canvas");
             ctx = canvas.getContext('2d');
             player1=new Cuadrado(super_x,super_y,50,50,"purple");
             player2=new Cuadrado(rand(10,500),rand(10,500),50,50,"blue");
             paint();

            };

            function paint(){
                window.requestAnimationFrame(paint);
                ctx.fillStyle="black";
                ctx.fillRect(0,0,500,500);
                
                //player1.c=random_rgba();
                player1.dibujar(ctx);
                player2.dibujar(ctx);
                ctx.fillStyle='orange';
                ctx.fillText('SCORE:'+score,30,30);


                /*
                ctx.fillStyle=random_rgba();
                ctx.fillRect(super_x,super_y,50,50);
                ctx.strokeRect(super_x,super_y,50,50);
                */
               if(!pause){
                update();

               }else{
                ctx.fillStyle="rgba(0,0,0,0.5)";
                ctx.fillRect(0,0,500,500);

                ctx.fillStyle='white';
                ctx.fillText('P A U S E:',230,230);

               }
               
            };

            function update(){
                //derecha
                if(direction=='right'){
                    player1.x+=10;
               
                if( player1.x>500){
                    player1.x=0;
                  }
                }

                //izquierda
                if(direction=='left'){
                    player1.x-=10;
                
                    if( player1.x<0){
                        player1.x=500;
                    }
                }
                if(direction='down'){
                    player1.y+=10;
                    if(player1.y>500){
                        player1.y=0;
                    }
                }
                if(direction=='up'){
                    player1.y-=10;
                    if(player1.y<0){
                        player1.y=500;
                    }

                }
                if(player1.se_tocan(player2)){
                    player2.y=rand(10,500);
                    player2.x=rand(10,500);
                    score+=10;

                }
               
            };
            
            document.addEventListener('keydown',function(e){
                console.log(e);
                //arriba
                if(e.keyCode==87 || e.keyCode==38){
                    console.log("arriba");
                   direction='up';
                }
                //abajo
                if(e.keyCode==83 || e.keyCode==40){
                    console.log("abajo");
                    direction='down';
                }
                //izquierda
                if(e.keyCode==65 || e.keyCode==37){
                    console.log("izquierda");
                   direction='left';
                }
                //derecha
                if(e.keyCode==68 || e.keyCode==39){
                    console.log("derecha");
                    direction='right';
                } 

                if(e.keyCode==32){
                    
                    
                    pause=(pause)?false:true;
                } 

            });


           

            window.addEventListener('load',start)

            window.requestAnimationFrame = (function () {
                return window.requestAnimationFrame ||
                window.webkitRequestAnimationFrame ||
                window.mozRequestAnimationFrame ||
                function (callback) {
                window.setTimeout(callback, 17);
                    };
            }());

            /*
            function random_rgba() {
                var o = Math.round, r = Math.random, s = 255;
                return 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + r().toFixed(1) + ')';
                };
                */
            function Cuadrado(x,y,w,h,c){
                this.x=x;
                this.y=y;
                this.w=w;
                this.h=h;
                this.c=c;
                this.se_tocan = function (target) { 

                    if(this.x < target.x + target.w &&

                    this.x + this.w > target.x && 

                    this.y < target.y + target.h && 

                    this.y + this.h > target.y)

                    {

                    return true;  

                    }  

                    };
                this.dibujar=function(ctx){
                    ctx.fillStyle=this.c;
    
                    ctx.fillRect(this.x,this.y,this.w,this.h);
                    ctx.strokeRect(this.x,this.y,this.w,this.h);
                }
            }

                rand = function(min, max) {
                if (min==null && max==null)
                    return 0;    
                
                if (max == null) {
                    max = min;
                    min = 0;
                    }
                    return min + Math.floor(Math.random() * (max - min + 1));
                };

           

           

   



        </script>
    </canvas>
</body>
</html>