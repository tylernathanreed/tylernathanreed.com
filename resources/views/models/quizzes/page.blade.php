@extends('layouts.page', [
    'stickyNav' => true
])

@section('page.content')

    <!-- Jumbotron -->
    <?php $color = $quizTemplate->color ?? 'primary'; ?>
    <header class="masthead bg-{{ $color }} text-white">
        <div class="container d-flex flex-column align-items-center justify-content-center">

            <!-- Jumbotron Heading -->
            <h1 class="masthead-heading text-center mb-0">{{ $quizTemplate->name }}</h1>

            <!-- Icon Divider -->
            <div class="divider-custom divider-light text-center">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>

            <!-- Jumbotron Content -->
            <div class="d-flex flex-column flex-sm-row align-items-center w-100">

                <!-- Jumbotron Avatar Image -->
                <?php $icon = $quizTemplate->icon ?? 'far fa-question-circle'; ?>

                <div class="masthead-avatar d-sm-block d-none">
                    <div class="{{ $icon }} w-100 h-100"></div>
                </div>

                <!-- Jumbotron Subheading -->
                <div class="flex-1 masthead-subheading font-weight-light mb-0 ml-4 mt-4 mt-sm-0">
                    {{ $quizTemplate->description }}
                </div>

            </div>
        </div>
    </header>

@endsection