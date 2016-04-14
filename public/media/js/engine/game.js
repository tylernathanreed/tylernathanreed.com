var Game = function()
{
	var self = this;

	this.Graphics = new Graphics(new Canvas(document.getElementById('canvas')));
	this.Engine = new Engine();

	this.resources = {
		sprites: {},
		objects: {},
	};

	Game.prototype.createSprite = function(options)
	{
		var sprite = new Sprite(options);

		self.resources.sprites[options.name] = sprite;

		return sprite;
	};

	Game.prototype.createObject = function(options)
	{
		var object = new GameObject(options);

		self.resources.objects[options.name] = object;

		return object;
	};

	Game.prototype.createInstance = function(options)
	{
		return self.Engine.createInstance(options);
	};

	Game.prototype.getSprite = function(name)
	{
		return self.resources.sprites[name];
	};

	Game.prototype.getObject = function(name)
	{
		return self.resources.objects[name];
	};

	Game.prototype.getInstance = function(id)
	{
		return self.Engine.instances[id];
	};

	Game.prototype.tick = function()
	{
		//console.log('[Game] Begin Tick');

		// Loop the Tick
		window.requestAnimationFrame(self.tick);

		// Tick Everything
		self.Engine.tick();
		self.Graphics.tick();

		//console.log('[Game] End Tick');
	};

	Game.prototype.init = function()
	{
		// Begin the Game Tick
		self.tick();
	};

	this.init();
}

Game = new Game();