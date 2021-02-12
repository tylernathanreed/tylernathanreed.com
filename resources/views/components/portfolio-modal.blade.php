<?php $name = isset($source) ? $source[$key]['name'] : ($name ?? ucfirst($key)); ?>
<?php $color = isset($source) ? $source[$key]['color'] : $key; ?>
<?php $icon = isset($source) ? $source[$key]['icon'] : null; ?>

<div class="portfolio-modal modal fade" id="portfolio-modal-{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="portfolio-modal-{{ $key }}-label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fas fa-times"></i></span>
            </button>
            <div class="modal-body">
                <div class="portfolio-modal-heading">
                    <div class="portfolio-modal-icon mr-2 mr-lg-4{{ !empty($icon) ? " {$icon} text-white p-md-2" : '' }} bg-{{ $color }}">
                        @if(is_null($icon))
                            <img class="img-fluid" src="{{ url("images/ecosystem/{$key}.min.svg") }}" alt="{{ $name }}" />
                        @endif
                    </div>
                    <h2 class="portfolio-modal-title text-secondary mb-0 pr-4" id="portfolio-modal-{{ $key }}-label">{{ $name }}</h2>
                </div>

                <div class="leading-normal">{!! $slot !!}</div>
            </div>
        </div>
    </div>
</div>