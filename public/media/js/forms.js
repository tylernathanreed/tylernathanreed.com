jQuery.fn.extend({
	listable: function(options) {
		return this.each(function() {
			// Determine the Container for the Items
			var container = $(this);

			// Create the Update Function
			var update = function() {
				container.children().each(function(index) {
					// Replace each Name Index
					$('[name]', this).each(function() {
						this.name = this.name.replace(/\[\{?\d+\}?\]/, '[' + index + ']');
					});

					// Replace the Hidden Order Inputs
					$('input[data-name=order]', this).each(function() {
						this.value = index;
					});
				});
			};

			// Make sure the Container is Sortable
			container.sortable({
				containment: 'parent',
				update: update
			});

			// Disable Text Selection within the Container (Excludes Form Items)
			container.disableSelection();

			// Determine the Template for the Items
			var template = $(options.template).html();

			// Determine the Add Button for the Container
			var add = $(options.add);

			// Register the Add Buttons
			add.click(function() {
				// Determine the Number of Items
				var count = container.children().length;

				// Determine the Element being Appended
				var element = $(template.replace(/\{0\}/g, count));

				// Determine the Remove Button
				var remove = $(options.remove, element[0]);

				// Register the Remove Button
				remove.click(function() {
					// Remove the Element
					element.remove();

					// Update the Indices
					update();
				});

				// Append the Element to the Container
				container.append(element);
			});

			// Register existing Remove Buttons
			container.children().each(function() {
				// Determine the Element bing Appended
				var element = $(this);

				// Determine the Remove Button
				var remove = $(options.remove, element[0]);

				// Register the Remove Button
				remove.click(function() {
					// Remove the Element
					element.remove();

					// Update the Indices
					update();
				});
			});
		});
	}
});
//# sourceMappingURL=forms.js.map
