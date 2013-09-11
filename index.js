
var HEIGHT = 250, 
	WIDTH = 250; // on change, need to propagate to index.css

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
	var lines = [];
	var lineIndex = -1;

	layer.add(me);

	layer.add(redLine);

	var anim = new Kinetic.Animation(function(frame) {
		var time = frame.time,
			timeDiff = frame.timeDiff,
			frameRate = frame.frameRate;
		if (down) {
			var mouse = stage.getMousePosition();
			if (mouse) {
				var points = redLine.getPoints();
				points.push({x:mouse.x, y:mouse.y});
				redLine.setPoints(points);
			}
		}
	}, layer);


	redLine.setPoints([0, 0, 0, 0]);
	document.onmousedown = function() {
		var mouse = stage.getMousePosition();
		if  (mouse) {
			redLineX = mouse.x;
			redLineY = mouse.y;
			down = true;
			redLine = new Kinetic.Line({
				points: [redLineX, redLineY],
				stroke: "red",
				strokeWidth: 5,
				lineCap: "round",
				lineJoin: "round"
			});
			layer.add(redLine);
			lines.push(redLine);

			//might be invisible ones right now
			lineIndex = lines.length - 1;

			//remove all beyond this index
			for (var x = 0; x < lines.length; x++) {
				if (lines[x].cache.visible == false) {
					lines.splice(x, 1);
					x--;
					// because x will always be less than lineIndex
					lineIndex--;
				}
			}
			anim.start();
		}
	};

	document.onmouseup = function(ev) {
		var mouse = stage.getMousePosition();
		if (mouse) {
			down = false;
			anim.stop();
		}
	}

	function undo() {
		if (lineIndex > -1 && lineIndex < lines.length) {
			var line = lines[lineIndex];
			line.hide();
			if (lineIndex > 0) {
				lineIndex--;
			}
			layer.draw();
		}
	}

	function redo() {
		if (lineIndex > -1 && lineIndex < lines.length) {
			var line = lines[lineIndex];
			line.show();
			if (lineIndex < lines.length - 1) {
				lineIndex++;
			}
			layer.draw();
		}
	}

	$(document).ready(function() {
		$("#undo-button").on("click", function () {
			undo();
		});

		$("#redo-button").on("click", function () {
			redo();
		});

		$("#send-button").on("click", function () {

			stage.toDataURL({
	        	callback: function(dataUrl) {
	            /*
	             * here you can do anything you like with the data url.
	             * In this tutorial we'll just open the url with the browser
	             * so that you can see the result as an image
	             */
	        		$.ajax({
	        			type: "POST",
						url: "sendPictureEmail.php",
						data: {dataURL: dataUrl, from: "me"}, //todo fix
						success: function (data) {
							alert("success");
						},
						error: function() {
							alert("fail!");
						}
					});
	        	}
	     	});
			
		});
	});




    stage.add(layer);
}
proPic.src = "APTProPic.jpg";

