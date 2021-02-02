<div class="d-flex flex-column h-100">
    <p class="lead flex-1">
        {!! $text ?? $slot !!}
    </p>
    <div class="text-center mt-3">
        <a class="btn btn-xl btn-outline-light text-nowrap w-75" href="{!! $link !!}">
            {!! $button !!}
        </a>
    </div>
</div>