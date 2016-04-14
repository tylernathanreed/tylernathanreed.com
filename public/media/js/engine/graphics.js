var Graphics = function(canvas)
{
	var self = this;

	this.canvas = canvas;
	this.buffer = [];

	Graphics.prototype.drawSprite = function(sprite, index, x, y)
	{
		self.buffer.push({
			sprite: sprite,
			index: index,
			x: x,
			y: y
		});

		//console.log(' -> [Graphics] Buffered Sprite');
		//console.log(self.buffer);
	}

	Graphics.prototype._drawSprite = function(options)
	{
		//console.log('    -> [Graphics] Drawing Sprite');
		//console.log(options);

		// Parse the Options
		var sprite = options.sprite;
		var index = options.index;
		var x = options.x;
		var y = options.y;

		// Determine the Sprite Variables
		var image = sprite.image;
		var source_x = index * sprite.width / sprite.index_count;
		var source_y = 0;
		var source_width = sprite.width / sprite.index_count;
		var source_height = sprite.height;
		var destination_x = x;
		var destination_y = y;
		var destination_width = source_width;
		var destination_height = source_height;

		// Draw the Sprite Image
		return canvas.getContext().drawImage(
			image,
			source_x,
			source_y,
			source_width,
			source_height,
			destination_x,
			destination_y,
			destination_width,
			destination_height
		);
	};

	Graphics.prototype.clear = function()
	{
		return canvas.clear();
	}

	Graphics.prototype.tick = function()
	{
		//console.log(' -> [Graphics] Begin Tick');

		// Clear the Canvas
		self.clear();

		// Draw Everything
		self.buffer.forEach(function(item)
		{
			self._drawSprite(item);
		});

		// Clear the Buffer
		self.buffer = [];

		//console.log(' -> [Graphics] End Tick');
	};
}