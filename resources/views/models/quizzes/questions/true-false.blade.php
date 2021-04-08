@component('models.quizzes.questions.question', compact('number', 'question'))

    <?php $options = ['True', 'False']; ?>

    <ul class="list-none mb-4">
        @foreach($options as $letter => $option)
            <li>
                <div class="checkbox d-inline-block">
                    <label class="cursor-pointer">
                        {!! Form::radio("answers[{$number}]", $option) !!}
                        <strong>{{ chr(ord('A') + $letter) }})</strong>
                        <span>{!! $option !!}</span>
                    </label>
                </div>
            </li>
        @endforeach
    </ul>

@endcomponent