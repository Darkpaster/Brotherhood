/*jshint esversion: 7 */

var pi = 3.141592;
var deg = pi / 180;

let count = 0;
let unlock = true;

const screenWidth = window.screen.width;
const screenHeight = window.screen.height;




function player(x,y,z,rx,ry) {
	this.x = x;
	this.y = y;
	this.z = z;
	this.rx = rx;
	this.ry = ry;
	this.vx = 3;
	this.vy = 5;
	this.vz = 3;
}


var map = [
		   [0,-50,1000,0,180,0,2000,300, "url(Images/wall.jpg)"],
		   [0,-50,-1000,0,0,0,2000,300, "url(Images/wall.jpg)"],
		   [1000,-50,600,0,-90,0,850,300, "url(Images/wall.jpg)"],
		   [1000,-50,-600,0,-90,0,850,300, "url(Images/wall.jpg)"],
		   [-1000,-50,0,0,90,0,2000,300, "url(Images/wall.jpg)"],

		   [0,-50,100,0,180,0,200,300, "url(Images/wall.jpg)"],
		   [0,-50,-100,0,0,0,200,300, "url(Images/wall.jpg)"],
		   [100,-50,0,0,-90,0,200,300, "url(Images/wall.jpg)"],
		   [-100,-50,0,0,90,0,200,300, "url(Images/wall.jpg)"],


		   [1400,-50,175,0,180,0,800,300, "url(Images/wall.jpg)"],
		   [1575,-50,-175,0,180,0,1150,300, "url(Images/wall.jpg)"],
		   [1800,-50,400,0,90,0,450,300, "url(Images/wall.jpg)"],
		   [2150,-50,225,0,90,0,800,300, "url(Images/wall.jpg)"],
		   [1975,-50,625,0,180,0,350,300, "url(Images/wall.jpg)"],		   


		   [0,100,0,90,0,0,2000,2000, "url(Images/floor.jpg)"],
		   [1400,100,0,90,0,0,800,350, "url(Images/floor.jpg)"],
		   [1975,100,225,90,0,0,350,800, "url(Images/floor.jpg)"],

		   [0,-200,0,90,0,0,2000,2000, "url(Images/floor.jpg)"],
		   [1400,-200,0,90,0,0,800,350, "url(Images/floor.jpg)"],
		   [1975,-200,225,90,0,0,350,800, "url(Images/floor.jpg)"]
];



var PressBack = 0;
var PressForward = 0;
var PressLeft = 0;
var PressRight = 0;
var PressUp = 0;
var MouseX = 0;
var MouseY = 0;

var dx = 0;
var dz = 0;
var dy = 0;

// захват мыши

var lock = false;

// На земле ли игрок?

var onGround = true;

var escWindow = document.getElementById("pawn");

var container = document.getElementById("container");


// const addit, yPoint;
// if(screenHeight > 768){
// 	const addit = 300 - ((screenHeight - 768) / 5);
// 	const yPoint = addit - (screenHeight / 3);
// 	var pawn = new player(-900, yPoint,-900,0,0);
// }else{
// 	const addit = 300;
// 	const yPoint = addit - (screenHeight / 3);
// 	var pawn = new player(-900, yPoint,-900,0,0);
// }

// const addit = 300 - ((2000 - 768) / 4);
// const yPoint = addit - (2000 / 3);
var pawn = new player(-900, 50,-900,0,0);

// Обработчик изменения состояния захвата курсора

document.addEventListener("pointerlockchange", (event)=>{
	if(lock){
	escWindow.style.display = "block";
	}
	lock = !lock;
	
});

// Обработчик захвата курсора мыши

container.onclick = function(){
	if (!lock) {
	 container.requestPointerLock();
	 escWindow.style.display = "none";
	}
	
};

// continue.addEventListener("click", (event), => {
	
// })


document.addEventListener("keydown", (event) =>{
	if (event.keyCode == 65){
		PressLeft = 2;
	}
	if (event.keyCode == 87){
		PressForward = 2;
	}
	if (event.keyCode == 68){
		PressRight = 2;
	}
	if (event.keyCode == 83){
		PressBack = 2;
	}
	if (event.keyCode == 32 && onGround){
		PressUp = 4;
	}
});



document.addEventListener("keyup", (event) =>{
	if (event.keyCode == 65){
		PressLeft = 0;
	}
	if (event.keyCode == 87){
		PressForward = 0;
	}
	if (event.keyCode == 68){
		PressRight = 0;
	}
	if (event.keyCode == 83){
		PressBack = 0;
	}
	if (event.keyCode == 32){
		PressUp = 4;
	}
});

// Обработчик движения мыши

document.addEventListener("mousemove", (event)=>{
	MouseX = event.movementX;
	MouseY = event.movementY;
});



var world = document.getElementById("world");


function update(){
	if(!lock){
		PressUp = 0;
		pawn.y = 50;
	}
	if(PressUp != 0 && unlock){
	count++;
	}
	
	// Задаем локальные переменные смещения
	if(count > 15){
		unlock = false;
	}
	if(lock){
		dx =   ((PressRight - PressLeft)*Math.cos(pawn.ry*deg) - (PressForward - PressBack)*Math.sin(pawn.ry*deg))*pawn.vx;
		dz = ( -(PressForward - PressBack)*Math.cos(pawn.ry*deg) - (PressRight - PressLeft)*Math.sin(pawn.ry*deg))*pawn.vz;
		dy = - PressUp;
	}
	
	
	drx = MouseY / 5;
	dry = - MouseX / 5;
	
	// Обнулим смещения мыши:
	
	MouseX = MouseY = 0;
	

	// Проверяем коллизию с прямоугольниками
	
	collision();
	
	// Прибавляем смещения к координатам

	if(!unlock){
		count--;
		pawn.y = pawn.y - dy;
		if (count == 0) {
			unlock = true;
			PressUp = 0;
		}
	}else{
		pawn.y = pawn.y + dy;
	}
	
	
	//console.log(pawn.x + ":" + pawn.y + ":" + pawn.z);
	
	// Если курсор захвачен, разрешаем вращение
	
	if (lock){
		pawn.x = pawn.x + dx;
		pawn.z = pawn.z + dz;
		pawn.rx = pawn.rx + drx;
		pawn.ry = pawn.ry + dry;

console.log("Player x = " + pawn.x);
console.log("Player y = " + pawn.y);
console.log("Player z = " + pawn.z);
console.log("screenHeight = " + screenHeight);
	}

	// Изменяем координаты мира (для отображения)
	
	world.style.transform = 
	"translateZ(" + (600 - 0) + "px)" +
	"rotateX(" + (-pawn.rx) + "deg)" +
	"rotateY(" + (-pawn.ry) + "deg)" +
	"translate3d(" + (-pawn.x) + "px," + (-pawn.y) + "px," + (-pawn.z) + "px)";
	
}

function CreateNewWorld(){
	for (let i = 0; i < map.length; i++){
		
		// Создание прямоугольника и придание ему стилей
		
		let newElement = document.createElement("div");
		newElement.className = "square";
		newElement.id = "square" + i;
		newElement.style.width = map[i][6] + "px";
		newElement.style.height = map[i][7] + "px";
		newElement.style.backgroundImage = map[i][8];
		newElement.style.transform = "translate3d(" +
		(600 - map[i][6]/2 + map[i][0]) + "px," +
		(400 - map[i][7]/2 + map[i][1]) + "px," +
		(map[i][2]) + "px)" +
		"rotateX(" + map[i][3] + "deg)" +
		"rotateY(" + map[i][4] + "deg)" +
		"rotateZ(" + map[i][5] + "deg)";
		
		// Вставка прямоугольника в world
		
		world.append(newElement);
	}
}

function collision(){
	
	onGround = false;
	
	for(let i = 0; i < map.length; i++){
		
		// рассчитываем координаты игрока в системе координат прямоугольника

		let y0 = (pawn.y - map[i][1]);
		
		let x0 = ((pawn.x + 50) - map[i][0]);
		
		let z0 = (pawn.z - map[i][2]);
		
		if ((x0**2 + y0**2 + z0**2 + dx**2 + dy**2 + dz**2) < (map[i][6]**2 + map[i][7]**2)){
		
			let x1 = x0 + dx;
			let y1 = y0 + dy;
			let z1 = z0 + dz;
		
			let point0 = coorTransform(x0,y0,z0,map[i][3],map[i][4],map[i][5]);
			let point1 = coorTransform(x1,y1,z1,map[i][3],map[i][4],map[i][5]);
			let normal = coorReTransform(0,0,1,map[i][3],map[i][4],map[i][5]);
		
			// Условие коллизии и действия при нем
		
			if (Math.abs(point1[0])<(map[i][6]+90)/2 && Math.abs(point1[1])<(map[i][7]+90)/2 && Math.abs(point1[2]) < 50){
				point1[2] = Math.sign(point0[2])*50;
				let point2 = coorReTransform(point1[0],point1[1],point1[2],map[i][3],map[i][4],map[i][5]);
				let point3 = coorReTransform(point1[0],point1[1],0,map[i][3],map[i][4],map[i][5]);
				dx = point2[0] - x0;
				dy = point2[1] - y0;
				dz = point2[2] - z0;
				if (Math.abs(normal[1]) > 0.8){
					if (point3[1] > point2[1]) onGround = true;
				}
				else dy = y1 - y0;
			}
			
		}
	};
}

function coorTransform(x0,y0,z0,rxc,ryc,rzc){
	let x1 =  x0;
	let y1 =  y0*Math.cos(rxc*deg) + z0*Math.sin(rxc*deg);
	let z1 = -y0*Math.sin(rxc*deg) + z0*Math.cos(rxc*deg);
	let x2 =  x1*Math.cos(ryc*deg) - z1*Math.sin(ryc*deg);
	let y2 =  y1;
	let z2 =  x1*Math.sin(ryc*deg) + z1*Math.cos(ryc*deg);
	let x3 =  x2*Math.cos(rzc*deg) + y2*Math.sin(rzc*deg);
 	let y3 = -x2*Math.sin(rzc*deg) + y2*Math.cos(rzc*deg);
	let z3 =  z2;
	return [x3,y3,z3];
}

function coorReTransform(x3,y3,z3,rxc,ryc,rzc){
	let x2 =  x3*Math.cos(rzc*deg) - y3*Math.sin(rzc*deg);
	let y2 =  x3*Math.sin(rzc*deg) + y3*Math.cos(rzc*deg);
	let z2 =  z3
	let x1 =  x2*Math.cos(ryc*deg) + z2*Math.sin(ryc*deg);
	let y1 =  y2;
	let z1 = -x2*Math.sin(ryc*deg) + z2*Math.cos(ryc*deg);
	let x0 =  x1;
	let y0 =  y1*Math.cos(rxc*deg) - z1*Math.sin(rxc*deg);
	let z0 =  y1*Math.sin(rxc*deg) + z1*Math.cos(rxc*deg);
	return [x0,y0,z0];
};


CreateNewWorld();
TimerGame = setInterval(update, 20);