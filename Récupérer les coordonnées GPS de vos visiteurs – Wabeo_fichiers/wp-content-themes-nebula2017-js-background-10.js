var lighter = [[1,0],[1,1],[0,1],[0,0],[0.2979,0],[0.2986,0.1055],[0.3861,0.0854],[0.4083,0.2048],[0.4722,0.2035],[0.4562,0.0515],[0.5361,0.1080],[0.5667,0.2085],[0.5854,0.1508],[0.6368,0.1796],[0.6493,0.1307],[0.6236,0.0817],[0.7146,0]];
var light = [[1,0],[1,1],[0,1],[0,0],[0.1972,0],[0.2715,0.1495],[0.2826,0.2525],[0.3347,0.1997],[0.3861,0.2776],[0.3882,0.3894],[0.3799,0.4133],[0.4201,0.3832],[0.4201,0.3291],[0.4917,0.3216],[0.5174,0.4598],[0.5479,0.4862],[0.5736,0.4460],[0.5687,0.3530],[0.5868,0.3329],[0.6257,0.3844],[0.6229,0.4460],[0.6535,0.3530],[0.6299,0.2852],[0.6903,0.1897],[0.7597,0.2412],[0.7562,0.0754],[0.8083,0]];
var dark = [[1,0],[1,1],[0,1],[0,0],[0.1556,0],[0.1625,0.1156],[0.1382,0.1369],[0.1924,0.1394],[0.2118,0.3103],[0.2840,0.3593],[0.3319,0.4636],[0.3201,0.4962],[0.3931,0.5427],[0.4458,0.5214],[0.5257,0.5967],[0.5917,0.5101],[0.6153,0.5565],[0.6771,0.4673],[0.6687,0.3945],[0.6917,0.2965],[0.7222,0.3405],[0.7174,0.2839],[0.7299,0.2437],[0.7667,0.2613],[0.7986,0.2236],[0.7833,0.0942],[0.8396,0]];
var darker = [[1,0],[1,1],[0,1],[0,0],[0.1236,0],[0.1118,0.0766],[0.0715,0.0942],[0.0819,0.2073],[0.1403,0.2186],[0.1965,0.3618],[0.2028,0.4724],[0.1667,0.5214],[0.2826,0.5678],[0.3500,0.5226],[0.4174,0.6633],[0.5007,0.7173],[0.5208,0.6608],[0.6375,0.5641],[0.6597,0.5766],[0.7285,0.4435],[0.7354,0.3668],[0.7618,0.3015],[0.8285,0.3643],[0.8104,0.3128],[0.8049,0.1746],[0.8458,0.1570],[0.8514,0.2425],[0.8806,0.1734],[0.8618,0]];
var darkest = [[1,0],[1,1],[0,1],[0,0],[0.0347,0],[0.0389,0.1897],[0.1097,0.2651],[0.1167,0.4246],[0.0979,0.4862],[0.1535,0.5905],[0.2528,0.5729],[0.3333,0.6193],[0.3465,0.6935],[0.4799,0.7739],[0.5257,0.6947],[0.6903,0.6495],[0.6778,0.5804],[0.7528,0.5264],[0.8382,0.5201],[0.8382,0.4083],[0.8833,0.3430],[0.9285,0.3819],[0.9035,0.2098],[0.9132,0.1445],[0.9542,0.1193],[0.9250,0]];
var colors = ['#3BB7C8', '#225A6D', '#152E42', '#15202C', '#13161C'];

var shapes = [lighter,light,dark,darker,darkest];

var origin = new Point(0,0);
var bgs = [];
var items = [[],[],[],[],[]];

var init = true;

var side = typeof initialSide !== 'undefined' ? initialSide : left;

var bg = {side: side, step: 0, move: 0};

var glued = false;

function createBlob(center, maxRadius, points) {
	var path = new Path();
	path.closed = true;
	for (var i = 0; i < points; i++) {
		var delta = new Point({
			length: (maxRadius * 0.5) + (Math.random() * maxRadius * 0.5),
			angle: (360 / points) * i
		});
		path.add(center + delta);
	}
	return path;
}

var rect = new Path.Rectangle({from:new Point(0,0), to:new Point(view.size.width,view.size.height)});
var groups = [
	new Group({children:[rect],clipped:true}),
	new Group({children:[rect.clone()],clipped:true}),
	new Group({children:[rect.clone()],clipped:true}),
	new Group({children:[rect.clone()],clipped:true}),
	new Group({children:[rect.clone()],clipped:true})
];
var values = {
	paths: 60,
	minPoints: 3,
	maxPoints: 9,
	minRadius: 25,
	maxRadius: 90
};

function getStartPoint(screen) {
	screen = parseInt(screen);
	if ( ! init ) {
		var p = ( Point.random() * view.size );
			p.y = p.y * ( ( screen + 1 ) / 5 );
			p.x = -20;
	} else {
		var p = new Point([ Math.random() * view.size.width,
			Math.random() * view.size.height * ( ( screen + 1 ) / 5 ) ]);
	}
	return p;
}

function getEndPoint(screen) {
	screen = parseInt(screen);
	var p = new Point([view.size.width + 20,
		Math.random() * view.size.height * ( ( screen + 1 ) / 5 ) ]);
	return p;
}


function createPaths() {
	var radiusDelta = values.maxRadius - values.minRadius;
	var pointsDelta = values.maxPoints - values.minPoints;
	for (var i = 0; i < values.paths; i++) {
		var radius = values.minRadius + Math.random() * radiusDelta;
		var points = values.minPoints + Math.floor(Math.random() * pointsDelta);
		var el = createBlob( getStartPoint(i%5), radius, points);
			el.destination = getEndPoint(i%5);
			if ( init ) {
				el.origin = new Point( -100, el.position.y );
			} else {
				el.origin = el.position;
			}
		var speed = Math.random();
			// speed = speed < .5 ? speed +.5 : speed;
			el.speed = speed * 4000 + 3000;
			el.fillColor = colors[i%5];
		items[i%5].push(el);
		groups[i%5].addChild(el);
	};
}

createPaths();

init = false;
for ( num in shapes ) {
	var p = new Path({
	    segments: shapes[num],
	    fillColor: colors[num],
	    closed: true,
	    pivot:origin,
	});
	p.scale(view.size.width, view.size.height);
	bgs.push(p);
	groups[num].addChild(p);
}

var board = new Layer( {children:groups, pivot:origin} );
var foot = new Path.Rectangle({from:new Point(0,view.size.height),to:new Point(view.size.width,view.size.height),fillColor: colors[4]});
var head = new Path.Rectangle({from:new Point(0,0),to:new Point(view.size.width,view.size.height / 2),fillColor: '#59e8f6'});
board.addChild(foot);
board.addChild(head);
head.sendToBack();

view.on('go', function(e) {
	if ( ! bg.move && e.dest ) {
		if ( e.dest != bg.side ) {
			bg.side = e.dest;
		}
	}
});

view.on('glue', function(e) {
	glued = ! glued;
});

function onFrame(event) {
	/**
	 * Animate blobs
	 */
	if ( glued ) {
		return false;
	}
	for ( k in items ) {
		for ( j in items[k] ) {
			var vector = items[k][j].destination - items[k][j].origin;
			var depasse = bg.side == 'right' ? items[k][j].position.x  < board.position.x : items[k][j].position.x > ( board.position.x + view.size.width );
			if ( depasse ) {
				items[k][j].origin   = getStartPoint(k) + board.position;
				items[k][j].destination = getEndPoint(k) + board.position;
				items[k][j].position = bg.side == 'right' ? items[k][j].destination : items[k][j].origin;
			}
			vector.length = vector.length / items[k][j].speed;
			items[k][j].position += bg.side == 'right' ? - vector : vector;
		}
	}
}