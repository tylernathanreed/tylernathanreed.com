function Canvas(element)
{
	var self = this;

	this.element = element;

	this.getContext = function()
	{
		return self.element.getContext("2d");
	}

	this.getWidth = function()
	{
		return self.element.width;
	},

	this.getHeight = function()
	{
		return self.element.height;
	},

	this.clear = function()
	{
		self.getContext().clearRect(0, 0, self.getWidth(), self.getHeight());
	},

	this.init = function()
	{
		self.element.width = 200;
		self.element.height = 200;
	}

	this.init();
}