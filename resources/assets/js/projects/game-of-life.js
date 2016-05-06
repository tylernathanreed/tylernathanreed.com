var ReactCell;

function Canvas(options) {
	var self = this;

	this.element = options.element;
	this.context = options.element.getContext('2d');
	this.click = $(options.element).click(function(event) {
		options.onClick({
			x: event.offsetX,
			y: event.offsetY,
			shift: event.shiftKey,
			alt: event.altKey,
			ctrl: event.ctrlKey,
			meta: event.metaKey
		});
	});

	this.setStyle = function(style) {
		this.context.fillStyle = style;
	};

	this.drawRectangle = function(x1, y1, x2, y2) {
		this.context.fillRect(x1, y1, x2, y2);
	};
}

function Cell(options) {
	var self = this;

	this.x = options.x;
	this.y = options.y;

	if(options.status !== undefined)
	{
		this.alive = options.status.startsWith("alive");
		this.old = options.status.endsWith("old");
	}
	else
	{
		this.alive = options.alive;
		this.old = options.old;
	}

	this.getStatus = function() {
		return this.alive ? ("alive" + (this.old ? " old" : "")) : "dead";
	};

	this.survive = function() {
		this.alive = true;
		this.old = true;
	};

	this.kill = function() {
		this.alive = false;
		this.old = undefined;
	};

	this.revive = function() {
		this.alive = true;
		this.old = false;
	};

	this.toggle = function() {
		this.alive = !this.alive;
		this.old = false;
	};

	this.onClick = function() {
		this.toggle();
	};

	this.getStyle = function() {
		if(this.alive && this.old)
			return "#CC0";
		else if(this.alive)
			return "#FF0";
		else
			return "#666";
	};

	this.draw = function(canvas, size) {
		// Draw the Border
		canvas.setStyle("#888");
		canvas.drawRectangle(this.x * size, this.y * size, size, size);

		// Draw the Fill
		canvas.setStyle(this.getStyle());
		canvas.drawRectangle(this.x * size + 1, this.y * size + 1, size - 1, size - 1);
	};
}

function Board(options) {
	var self = this;

	this.generation = 0;
	this.cells = [];

	this.width = options.width;
	this.height = options.height;

	this.cell_size = options.size;

	this.running = false;
	this.delay = 25;

	this.canvas = new Canvas({
		element: options.canvas,
		onClick: function(e) {
			var x = Math.floor(e.x / self.cell_size);
			var y = Math.floor(e.y / self.cell_size);

			self.getCell(x, y).onClick(e);

			self.draw();
		}
	});

	this.clear = function() {
		this.generation = 0;
		$("#game-of-life .counter").text("Generation: 0");

		return this.forEach(function(cell) {
			cell.kill();
		});
	};

	this.initialize = function() {
		this.cells = [];

		for(var i = 0; i < this.width; i++)
		{
			this.cells[i] = [];

			for(var j = 0; j < this.height; j++)
				this.cells[i][j] = new Cell({
					x: i,
					y: j,
					alive: Math.round(Math.random())
				});
		}

		return this.cells;
	};

	this.getCell = function(i, j) {
		// Wrap the Indices
		i = (i + this.width) % this.width;
		j = (j + this.height) % this.height;

		// Determine the specified Cell
		var cell = this.cells[i][j];

		// Alert if Undefined
		if(cell === undefined)
			console.log('[Error] Board - getCell: Undefined Cell Position at [' + i + ', ' + j + ']');

		// The Cell Must be Alive, or Alive and Old
		return cell;
	};

	this.forEach = function(callback) {
		this.cells.forEach(function(row, i) {
			row.forEach(function(cell, j) {
				callback(cell);
			});
		});
	};

	this.draw = function() {
		this.forEach(function(cell) {
			cell.draw(self.canvas, self.cell_size);
		});

		$("#game-of-life .counter").text('Generation: ' + self.generation);
		// $("#game-of-life .population").text('Population: ' + self.population);
	};

	this.construct = function() {
		this.initialize();
		this.draw();
	};

	this.getNeighborCount = function(cell) {
		// Initialize the Neighbor Count
		var count = 0;

		// Check each Neighbor
		for(var i = -1; i <= 1; i++)
			for(var j = -1; j <= 1; j++)
				if(i === 0 && j === 0)
					continue;
				else if(this.getCell(cell.x + i, cell.y + j).alive)
					count++;

		return count;
	};

	this.getNextGeneration = function() {
		var neighbors = [];

		this.forEach(function(cell) {
			neighbors[cell.x * self.cell_size + cell.y] = self.getNeighborCount(cell);
		});

		this.forEach(function(cell) {
			var count = neighbors[cell.x * self.cell_size + cell.y];

			if(cell.alive && (count === 2 || count === 3))
				cell.survive();
			else if(!cell.alive && count === 3)
				cell.revive();
			else if(cell.alive)
				cell.kill();
		});
	};

	this.run = function() {
		if(!this.running)
			return;

		self.generation++;
		self.getNextGeneration();

		setTimeout(function() {
			self.draw();
			self.run();
		}, self.delay);
	};

	this.start = function() {
		this.running = true;
		this.run();
		this.generation = 0;
	};

	this.pause = function() {
		this.running = false;
	};

	this.resume = function() {
		this.running = true;
		this.run();
	};

	this.stop = function() {
		this.running = false;
		this.generation = 0;
	};

	this.activate = function() {
		$('.btn-run').click(function() {
			if(self.running)
			{
				$(this).children().switchClass('glyphicon-play', 'glyphicon-pause');
				self.pause();
			}
			else
			{
				$(this).children().switchClass('glyphicon-pause', 'glyphicon-play');
				self.resume();
			}
		});

		$('.btn-clear').click(function() {
			self.clear();
			self.stop();
			self.draw();
		});

		$('.btn-refresh').click(function() {
			self.initialize();
			self.stop();
			self.draw();
		});
	};

	this.construct();
	this.activate();
	this.running = true;
	this.run();
}

$(document).ready(function() {
	// Prepare all Canvases
	$('canvas').each(function() {
		this.width = $(this).parent().width();
		this.height = $(this).parent().height();
	});

	// Clear out Text Fields
	$(".gen").text("0");
	$(".population").text("0");

	// Determine the Game Canvas
	var canvas = $('#game canvas')[0];

	// Create the Board
	window['board'] = new Board({
		canvas: canvas,
		width: Math.floor(canvas.width / 16),
		height: Math.floor(canvas.height / 16),
		size: 16
	});
});

function removeListeners() {
	$('.50').off();
	$('.70').off();
	$('.100').off();
	$('.btn-run').off();
	$('.reset').off();
	$('.btn-stop').off();
	$('.cell').off();
	$('.slow').off();
	$('.medium').off();
	$('.fast').off();
};