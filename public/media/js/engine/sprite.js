function Sprite(options)
{
	var self = this;

	// Create the Image for the Sprite
	var image = new Image();

	image.src = options.image;

	// Create the Sprite
	this.name = options.name;
	this.width = image.width;
	this.height = image.height;
	this.image = image;
	this.index_count = options.index_count || 1;
}