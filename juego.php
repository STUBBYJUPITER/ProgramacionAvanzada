<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		Canvas
	</title>
	<style type="text/css">
		body{
			width: 100%;
		}
		
	</style>
</head>
<body>
	<canvas id="mycanvas" width="500" height="500">
		Tu navegador no soporta canvas
	</canvas>
    <img src="wolf.png" id="imagen" width="40" height="40">
	<script type="text/javascript">
		
		var canvas = null;
		var ctx = null;
		var player1 = null;
		var player2 = null;
        var obstaculo1=null;
		var super_x = 10, super_y = 10;
		var direction = 'right';
		var score = 0;
		var speed = 5;
		var pause = false;
		function start()
		{
			canvas = document.getElementById('mycanvas');
			ctx = canvas.getContext('2d');
			player1 = new Cuadrado(super_x,super_y,40,40,'purple');
			player2 = new Cuadrado(RandomNumber(460),RandomNumber(460),40,40,'red');
            obstaculo1=new Cuadrado(250,250,200,25,"silver");
			paint();
		} 
		function paint()
		{
			window.requestAnimationFrame(paint)
			ctx.fillStyle = "black";
			ctx.fillRect(0,0,500,500);
            //TABLERO
			ctx.fillStyle = "white";
			ctx.fillText('SCORE:'+score+'  SPEED:'+speed,30,20);

			player1.dibujar(ctx);
			player2.dibujar(ctx);
            obstaculo1.dibujar(ctx);
			if (pause) {
				
				ctx.fillStyle = "rgba(0,0,0,0.5)"
				ctx.fillRect(0,0,500,500)
				ctx.fillStyle = "white";
				ctx.fillText('P A U S E',230,230);
			}else{
				update();
			}
			
		}
		function update()
		{
			
			if (direction == 'right') {
				player1.x += speed;
				if (player1.x>500) {
					player1.x = 0;
				}
			}
			if (direction == 'left') {
				player1.x -= speed;
				if (player1.x<0) {
					player1.x = 500;
				}
			}
			
			if (direction == 'down') {
				player1.y += speed;
				if (player1.y>500) {
					player1.y = 0;
				}
			}
			if (direction == 'up') {
				player1.y -= speed;
				if (player1.y<0) {
					player1.y = 500;
				}
			}
			if (player1.se_tocan(player2)) {
				player2.x = RandomNumber(500);
				player2.y = RandomNumber(500);
				score += 1;
				speed += 1;
			}

            if(player1.se_tocan(obstaculo1)){
                speed=0;
                score-1;
               
                
            }
            if(player2.se_tocan(obstaculo1)){
                player2.x=RandomNumber(440);
                player2.y=RandomNumber(440);
            }
            if(player2.x==super_x && player2.y==super_y){
                player2.x=RandomNumber(440);
                player2.y=RandomNumber(440);

            }
			
		}
		document.addEventListener('keydown',function(e){
            console.log(e);
			//arriba
			if (e.keyCode == 87 || e.keyCode == 38) {
				direction = 'up';
			}
			//abajo
			if (e.keyCode == 83 || e.keyCode == 40) {
				direction = 'down';
			}
			//izquierda
			if (e.keyCode == 65 || e.keyCode == 37) {
				direction = 'left';
			}
			//derecha
			if (e.keyCode == 68 || e.keyCode == 39) {
				direction = 'right';
			}
			//pause
			if (e.keyCode == 32  ) { 
				pause = (pause)?false:true;
			}
		})
		window.addEventListener('load',start)
		window.requestAnimationFrame = (function () {
		    return window.requestAnimationFrame ||
		        window.webkitRequestAnimationFrame ||
		        window.mozRequestAnimationFrame ||
		        function (callback) {
		            window.setTimeout(callback, 17);
		        };
		}());
		function Cuadrado(x,y,w,h,c)
		{
			this.x = x;
			this.y = y;
			this.w = w;
			this.h = h;
			this.c = c;
			this.se_tocan = function (target) { 
				if(this.x < target.x + target.w &&
				   this.x + this.w > target.x && 
				   this.y < target.y + target.h && 
				   this.y + this.h > target.y)
				{
					return true;  
				}  
			};
			this.dibujar = function(ctx){
				ctx.fillStyle = this.c;
				ctx.fillRect(this.x,this.y,this.w,this.h);
				ctx.strokeRect(this.x,this.y,this.w,this.h);
			}
		}
		function random_rgba() {
		    var o = Math.round, r = Math.random, s = 255;
		    return 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + r().toFixed(1) + ')';
		}
		function RandomNumber(max) {
		    return Math.floor(Math.random() * max) + 1;
		}
	</script>
</body>
</html>