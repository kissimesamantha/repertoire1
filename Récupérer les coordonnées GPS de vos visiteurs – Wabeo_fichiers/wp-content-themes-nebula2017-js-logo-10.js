window.onload = function() {
	var canvas = document.getElementById('logo-img');
	paper.setup(canvas);

	canvas.width = 100;
	canvas.height = 100;
	var logo;
	var left =  new paper.Point(0,0);
	var right =  new paper.Point(90,0);
	paper.projects[1].importSVG(logoWabeo, function(el,svg){
		el.pivot = new paper.Point(0,0);
		el.scale(4);
		el.fillColor = {
			gradient: {
			    stops: ['yellow', 'blue']
			},
			origin: left,
			destination: right,
		};
		logo = el.id;
	});

	var d = 0;
	paper.projects[1].view.onFrame = function(event) {
		if ( typeof logo != 'undefined' ) {
			var item = paper.projects[1].getItem({id:logo});
			item.style.fillColor = {
				gradient: {
				    stops: ["hsl("+((d))+",100%,75%)","hsl("+((d)+50)+",100%,75%)"],
				},
				origin: left,
				destination: right,
			};d++;
			if ( d == 360 ) {
				d = 0;
			}
		}
	}
	paper.projects[1].view.draw();
}