
var HEIGHT = 250, 
	WIDTH = 250;

var stage = new Kinetic.Stage({
	container: 'pro-pic',
	width: WIDTH,
	height: HEIGHT
});

var layer = new Kinetic.Layer();


var proPic = new Image();
proPic.onload = function() {
	var me = new Kinetic.Image({
		x: 0,
		y: 0,
		image: proPic,
		width: WIDTH,
		height: HEIGHT
	});

	var redLine = new Kinetic.Line({
						points: [0, 0, 0, 0],
						stroke: "red",
						strokeWidth: 5,
						lineCap: "round",
						lineJoin: "round"
					});;
	var redLineX = 0;
	var redLineY = 0;
	var down = false;

	layer.add(me);

	layer.add(redLine);

	redLine.setPoints([0, 0, 0, 0]);
	document.onmousedown = function() {
		var mouse = stage.getMousePosition();
		if  (mouse) {
			redLineX = mouse.x;
			redLineY = mouse.y;
			down = true;
			redLine = new Kinetic.Line({
				points: [0, 0, 0, 0],
				stroke: "red",
				strokeWidth: 5,
				lineCap: "round",
				lineJoin: "round"
			});
			layer.add(redLine);
		}
	};

	document.onmouseup = function(ev) {
		var mouse = stage.getMousePosition();
		if (mouse) {
			down = false;
		}
	}

	var anim = new Kinetic.Animation(function(frame) {
		var time = frame.time,
			timeDiff = frame.timeDiff,
			frameRate = frame.frameRate;
		if (down) {
			var mouse = stage.getMousePosition();
			if (mouse) {
				redLine.setPoints([redLineX, redLineY, mouse.x, mouse.y]);
			}
		}
	}, layer);

	anim.start();


    stage.add(layer);
}
proPic.src = "APTProPic.jpg";

