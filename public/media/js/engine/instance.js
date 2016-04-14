var Instance = function(options)
{
	// Remap this to Local Variable
	var self = this;

	this.object = options.object;

	// Identification
	this.id = Instance.currentId || 1;
	Instance.currentId = ++Instance.currentId || 2;

	// Image Variables
	this.sprite = options.object.sprite;
	this.sprite_index = options.sprite_index || 0;
	this.sprite_tick = 0;
	this.sprite_speed = options.sprite_speed || 1;

	// Position Variables
	this.x = options.x || 0;
	this.y = options.y || 0;

	/**
	 * @todo This type of functionality should exist in the Game Object
	 */
	this.draw = function()
	{
		Game.Graphics.drawSprite(self.sprite, self.sprite_index, self.x, self.y);
	};

	this.tick = function()
	{
		//console.log('       -> [Instance (' + self.id + ')] Begin Tick');

		// Increase the Sprite Tick Count
		self.sprite_tick = (self.sprite_tick + 1) % Math.floor(1 / self.sprite_speed * self.sprite.index_count);

		// Determine the Sprite Index
		self.sprite_index = (Math.floor(self.sprite_tick * self.sprite_speed) % self.sprite.index_count + self.sprite.index_count) % self.sprite.index_count;

		// Draw Self
		self.draw();

		//console.log('       -> [Instance (' + self.id + ')] End Tick');
	};
}