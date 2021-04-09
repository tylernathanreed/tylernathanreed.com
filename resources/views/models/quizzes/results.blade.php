@extends('models.quizzes.page')

@section('page.content')

    @parent

    <!-- Question Section -->
    <section class="page-section portfolio">
        <div class="container">

            <!-- Question Section Heading -->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Results</h2>

            <!-- Icon Divider -->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>

            <?php $percent = $results['score']; ?>

            <h3 class="d-flex justify-content-between mb-4 w-100">
                <div>Score: {{ $percent }}%</div>
                <div>{{ $results['total_awarded'] }} of {{ $results['total_available'] }} Points</div>
            </h3>

            @if($percent > 90)
                <?php $color = 'success'; ?>
            @elseif($percent > 70)
                <?php $color = 'primary'; ?>
            @elseif($percent > 60)
                <?php $color = 'warning'; ?>
            @else
                <?php $color = 'danger'; ?>
            @endif

            <!-- Progress Bar -->
            <div class="progress mb-4">
                <div
                    class="progress-bar bg-{{ $color }}"
                    role="progressbar"
                    style="width: {{ $percent }}%;"
                    aria-valuenow="{{ $results['total_awarded'] }}"
                    aria-valuemin="0"
                    aria-valuemax="{{ $results['total_available'] }}"
                >
                </div>
            </div>

            <h3 class="mb-4">Ratings</h3>

            <section class="mb-4">
                <style>
                    #ratings.ct-series-a .ct-bar { stroke: var(--primary); }
                </style>

                <div id="ratings" class="ct-chart"></div>

                <?php $labels = array_map(function($points) use ($results) {
                    return round($points / $results['total_available'] * 100) . '%';
                }, range(0, $results['total_available'])); ?>

                <?php $breakdown = $quizTemplate->getRankingBreakdown(); ?>

                @foreach($breakdown as $score => $count)
                    <?php $otherScores[] = $score == $percent ? 0 : $count; ?>
                    <?php $currentScore[] = $score != $percent ? 0 : $count; ?>
                @endforeach

                <script>
                    let data = {
                        labels: {!! json_encode($labels) !!},
                        series: [
                            {!! json_encode($otherScores) !!},
                            {!! json_encode($currentScore) !!}
                        ]
                    };

                    let options = {
                        stackBars: true,
                        axisY: {
                            onlyInteger: true
                        }
                    };

                    new Chartist.Bar('.ct-chart', data, options);
                </script>

                <div class="text-right">
                    <small class="text-muted">Global Attempts: {{ array_sum($breakdown) }}</small>
                </div>
            </section>

            <h3 class="mb-4">Questions</h3>

            <section class="mb-4">
                @foreach($results['orders'] as $index => $order)

                    <?php $question = $results['questions'][$order]; ?>

                    <div class="mb-4">
                        <div class="d-flex mb-1">
                            <strong class="pr-1">{{ $index + 1 }}) </strong>
                            <span class="flex-1">{!! $question['prompt'] !!}</span>
                            <span class="pl-1 text-muted">({{ $question['awarded'] }} of {{ $question['available'] }})</span>
                        </div>

                        <ul class="ml-4">
                            <li>
                                <span>Your Answer: </span>
                                <strong class="{{ $question['status'] == 'correct' ? 'text-success' : 'text-danger' }}">{{ $question['provided'] }}</strong>
                            </li>
                            <li>
                                <span>Correct Answer: {{ $question['answer'] }}</span>
                            </li>
                        </ul>
                        
                    </div>

                @endforeach
            </section>

            <div class="d-flex justify-content-between">
                <a href="{{ route('quiz.index') }}" class="btn btn-lg btn-primary">
                    &laquo; Back to Quizzes
                </a>

                <a href="{{ route('quiz.show', $quizTemplate) }}" class="btn btn-lg btn-primary">
                    &#8635; Retake Quiz
                </a>
            </div>
        </div>
    </section>

@endsection

@push('head')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
@endpush