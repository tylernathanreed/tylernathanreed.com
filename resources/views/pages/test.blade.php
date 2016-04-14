@extends('layouts.app')

@section('content')

	<style>
		canvas {
			display: block;
			margin: auto;
			border: 3px solid black;
		}
	</style>

	<div class="container">
		<canvas id="canvas"></canvas>
	</div>

	<script src="/media/js/utilities/helpers.js"></script>

	<!-- Load Graphics -->
	<script src="/media/js/engine/sprite.js"></script>
	<script src="/media/js/engine/canvas.js"></script>
	<script src="/media/js/engine/graphics.js"></script>

	<!-- Load Engine -->
	<script src="/media/js/engine/instance.js"></script>
	<script src="/media/js/engine/engine.js"></script>

	<!-- Load Game -->
	<script src="/media/js/engine/game.js"></script>

	<script>

		function GameObject(options)
		{
			this.name = options.name;

			this.sprite = options.sprite || null;
		}

		/**
		 * @constructor
		 * @abstract
		 */
		var AbstractGameObject = function()
		{
			// Prevent Construction
			if(this.constructor === AbstractGameObject)
			{
				throw new Error('You cannot instantiate an Abstract Class (AbstractGameObject)');
			}

			// Class Variables
			this.sprite = null;
			this.sprite_index = 0;
			this.sprite_tick = 0;
			this.sprite_speed = 1;

			this.x = 0;
			this.y = 0;
		};

		AbstractGameObject.prototype.draw = function()
		{
			Game.Graphics.drawSprite(this.sprite, this.sprite_index, this.x, this.y);
		};

		Game.constructor.prototype.createAbstractObject = function(name)
		{

		};

	</script>
	<script>

		(function () {

			var spr_coin = Game.createSprite({
				name: "coin",
				image: "media/images/misc/coin-sprite-animation-sprite-sheet.png",
				index_count: 10,
				speed: 0.5
			});

			var obj_coin = Game.createObject({
				name: 'coin',
				sprite: Game.getSprite('coin')
			});

			var inst_coin_1 = Game.createInstance({
				object: Game.getObject('coin'),
				x: 0,
				y: 0
			});

			var inst_coin_2 = Game.createInstance({
				object: Game.getObject('coin'),
				x: 64,
				y: 64
			});

			var inst_coin_3 = Game.createInstance({
				object: Game.getObject('coin'),
				sprite_speed: 0.5,
				x: 8,
				y: 8
			});

			console.log(Game);
		}());
	</script>

@endsection
