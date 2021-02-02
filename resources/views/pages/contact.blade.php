@extends('layouts.page')

@section('page.content')

    <!-- Jumbotron -->
    <section class="page-section portfolio">
        <div class="container">

            <!-- Jumbotron Heading -->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Get in Touch</h2>

            <!-- Icon Divider -->
            <div class="divider-custom text-center">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>

            <?php $contacts = [
                'email'    => ['name' => 'Email',       'icon' => 'fas fa-envelope',       'color' => 'yellow', 'description' => 'tylernathanreed@gmail.com'],
                'phone'    => ['name' => 'Call & Text', 'icon' => 'fas fa-phone-alt',      'color' => 'cyan',   'description' => '469.230.9970'],
                'location' => ['name' => 'Location',    'icon' => 'fas fa-map-marker-alt', 'color' => 'pink',   'description' => 'Dallas, TX']
            ]; ?>

            <div class="row justify-content-center">
                @foreach($contacts as $key => $info)
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolio-modal-{{ $key }}">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white">Read More</div>
                            </div>
                            <div class="d-flex align-items-center p-2">
                                <div class="portfolio-item-icon {{ $info['icon'] }} bg-{{ $info['color'] }} text-white p-2"></div>
                                <div class="ml-3 mr-3">
                                    <div>{{ $info['name'] }}</div>
                                    <small class="text-muted text-xs">{{ $info['description'] }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center">
                Want to reach out? Give me a call or shoot me a text message.
            </div>
        </div>
    </section>

    @component('components.banner-buttons', [
        'heading' => 'On the Web',
        'slots' => 3
    ])

        @slot('slot0')
            @component('components.banner-button', [
                'link' => '//www.github.com/tylernathanreed',
                'button' => '<i class="fab fa-fw fa-github"></i> GitHub'
            ])
                If you want to view some of my projects, past and present,
                take a look at my GitHub where I house all of my recreational projects.
            @endcomponent
        @endslot

        @slot('slot1')
            @component('components.banner-button', [
                'link' => '//www.linkedin.com/in/tylernathanreed',
                'button' => '<i class="fab fa-fw fa-linkedin-in"></i> LinkedIn'
            ])
                If you want to get connected, check me out on LinkedIn!
                It's a great place to maintain business relationships.
            @endcomponent
        @endslot

        @slot('slot2')
            @component('components.banner-button', [
                'link' => '//https://codepen.io/tylernathanreed',
                'button' => '<i class="fab fa-fw fa-codepen"></i> Code Pen'
            ])
                Sometimes I slap together prototypes of random ideas, and
                Code Pen is a great place to get started.
            @endcomponent
        @endslot
    @endcomponent

@endsection