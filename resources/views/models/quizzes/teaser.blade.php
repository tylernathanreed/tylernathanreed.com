<div class="portfolio-item-lg mx-auto">
    <div class="d-flex align-items-center p-2">

        <?php $icon = $quiz->icon ?? 'fas fa-question'; ?>
        <?php $color = $quiz->color ?? 'blue'; ?>

        <div class="portfolio-item-icon {{ $icon }} bg-{{ $color }} text-white p-4"></div>
        <div class="ml-3 mr-3">
            <a href="{{ route('quiz.show', $quiz) }}" class="d-block">{{ $quiz->name }}</a>
            <small class="text-muted text-xs">{{ $quiz->description }}</small>
        </div>
    </div>
    <small class="position-absolute pin-b pin-r p-2">
        Questions: {{ $quiz->questions_count }}
    </small>
</div>