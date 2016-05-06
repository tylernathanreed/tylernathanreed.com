@include('partials.modal-body', [
	'modal' => [
		'id' => 'my-modal',
		'title' => 'Edit Menu Item',
		'fields' => [
			'title' => [
				'label' => 'Title',
				'type' => 'text',
				'class' => 'span-left',
				'attributes' => [
					'maxlength' => 255,
					'placeholder' => 'The Menu Item Title...'
				]
			],

			'type' => [
				'label' => 'Type',
				'type'  => 'select',
				'class' => 'span-right',
				'attributes' => [
					'options' => [
						'url' => 'URL',
						'route' => 'Route'
					]
				]
			],

			'url' => [
				'label' => 'URL',
				'type' => 'text',
				'class' => 'span-full',
				'attributes' => [
					'maxlength' => 255,
					'placeholder' => 'The Menu Item URL...',
				],
				'group' => [
					'data-visible-select' => 'type',
					'data-visible-value' => 'url'
				]
			],

			'route' => [
				'label' => 'Route',
				'type' => 'text',
				'class' => 'span-full',
				'attributes' => [
					'maxlength' => 255,
					'placeholder' => 'The Menu Item Route Name...',
				],
				'group' => [
					'data-visible-select' => 'type',
					'data-visible-value' => 'route',
					'style' => 'display: none'
				]
			],

			'permissions[]' => [
				'label' => 'Permissions',
				'type' => 'select',
				'class' => 'span-full',
				'attributes' => [
					'placeholder' => 'Permissions',
					'options' => $permissions,
					'multiple' => 'multiple'
				]
			]
		]
	]
])