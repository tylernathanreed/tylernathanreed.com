@extends('models.quizzes.page')

@section('page.content')

    @parent

    <!-- Question Section -->
    <section class="page-section portfolio">
        <div class="container">

            <!-- Question Section Heading -->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Questions</h2>

            <!-- Icon Divider -->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>

            <?php $current = $current ?? 1; ?>
            <?php $count = $quizTemplate->questions()->count(); ?>

            <div class="text-center mb-4">
                Question <span id="quiz-counter">{{ $current }}</span> of {{ $count }}
            </div>

            <!-- Progress Bar -->
            <div id="quiz-progress" class="progress mb-4">
                <div
                    class="progress-bar progress-bar-striped progress-bar-animated"
                    role="progressbar"
                    style="width: {{ round(($current - 1) / $count * 100) }}%;"
                    aria-valuenow="{{ $current - 1 }}"
                    aria-valuemin="0"
                    aria-valuemax="{{ $count }}"
                >
                </div>
            </div>

            <?php $question = $quizTemplate->questions()->where('default_order', '=', $current)->first(); ?>

            {!! Form::open([
                'id' => 'quiz-form'
            ]) !!}

                <div id="quiz" class="carousel slide text-xl" data-wrap="false" data-interval="false">
                    <div class="carousel-inner">

                        @foreach($quizTemplate->questions->shuffle() as $number => $question)
                            <div class="carousel-item{{ $loop->first ? ' active' : '' }}">
                                @include($question->getViewTemplate(), compact('number', 'question'))
                                {!! Form::hidden("orders[{$number}]", $question->default_order) !!}
                            </div>
                        @endforeach

                    </div>

                    <div id="quiz-validation" class="text-md text-danger text-center mb-2" style="display: none;">
                        <span>An answer must be provided.</span>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a class="btn btn-lg btn-primary disabled" href="#quiz" role="button" data-slide="prev">
                            <span>&laquo; Back</span>
                        </a>

                        <a class="btn btn-lg btn-primary" href="#quiz" role="button" data-slide="next">
                            <span>Next &raquo;</span>
                        </a>

                        <button type="submit" class="btn btn-lg btn-danger" style="display: none">
                            <span>Submit</span>
                        </button>
                    </div>
                </div>

            {!! Form::close() !!}
        </div>
    </section>

@endsection

@push('tail')

    <script>

        // When the carousel sliding begins...
        $('#quiz').on('slide.bs.carousel', function(e) {

            // Make sure an answer has been provided
            if(e.direction == 'left' && !answerProvided(e.from)) {

                // Prevent the default behavior
                e.preventDefault();

                // Display a validation error
                $('#quiz-validation').show();

                // Stop here
                return;

            }

            // Hide any validation errors
            $('#quiz-validation').hide();

            // Update the question counter
            $('#quiz-counter').text(e.to + 1);

            // Update the quiz progress
            $('#quiz-progress .progress-bar')
                .attr('aria-valuenow', e.to + 1)
                .width(Math.round((e.to) / {{ $count }} * 100) + '%');

        });

        // When the carousel sliding ends
        $('#quiz').on('slid.bs.carousel', function(e) {

            // Make sure an answer has been provided
            if(e.direction == 'left' && !answerProvided(e.from)) {

                // Prevent the default behavior
                e.preventDefault();

                // Stop here
                return;

            }

            // Toggle the back button status
            if(e.to != 0) {
                $('#quiz a[data-slide=prev]').removeClass('disabled');
            } else {
                $('#quiz a[data-slide=prev]').addClass('disabled');
            }

            // Toggle the next/submit button visibility
            if(e.to == {{ $count - 1 }}) {

                $('#quiz a[data-slide=next]').hide();
                $('#quiz button[type=submit]').show();

            } else {

                $('#quiz a[data-slide=next]').show();
                $('#quiz button[type=submit]').hide();

            }

        });

        // Returns whether or not an answer has been provided on the given question
        function answerProvided(slideNumber) {
            return !!(answer = _.find($('#quiz-form').serializeArray(), {name: 'answers[' + slideNumber + ']'})) && !!answer.value;
        }

    </script>

@endpush