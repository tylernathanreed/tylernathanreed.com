var Engine = function(game)
{
	var self = this;

	this.instances = {};

	Engine.prototype.tick = function()
	{
		//console.log(' -> [Engine] Begin Tick');

		// Tick Everything
		_each(self.instances, function(id, instance)
		{
			//console.log('    -> [Engine] Ticking Instance ' + instance.id);
			//console.log(instance);
			instance.tick();
		});

		//console.log(' -> [Engine] End Tick');
	};

	Engine.prototype.createInstance = function(options)
	{
		var instance = new Instance(options);

		self.instances[instance.id] = instance;

		//console.log('    -> [Engine] Registered new Instance');
		//console.log(instance);

		return instance;
	};
}