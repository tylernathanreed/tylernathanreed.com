<div class="mb-2">
    <strong>{{ $number + 1}})</strong>
    <span>{!! $question->prompt['question'] !!}</span>
</div>

@if(!is_null($code = ($question->prompt['code'] ?? null)))
    <code class="d-block border px-3 py-2 mb-3">
        {!! str_replace(["\n", "\t"], ['<br>', '&nbsp;&nbsp;'], $code) !!}
    </code>
@endif

{!! $slot !!}