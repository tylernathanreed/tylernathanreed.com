<section class="page-section bg-primary text-white mb-0 leading-normal">
    <div class="container">

        <!-- Section Heading -->
        <h2 class="page-section-heading text-center text-uppercase text-white">
            {!! $heading !!}
        </h2>

        <!-- Icon Divider -->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>

        <!-- Section Content -->
        <div class="row justify-content-center">
            @foreach(range(0, $slots - 1) as $index)
                <div class="col-lg-4{{ !$loop->last ? ' mb-16 mb-lg-0' : '' }}" style="max-width: 400px">
                    {!! ${'slot' . $index} ?? null !!}
                </div>
            @endforeach
        </div>
    </div>
</section>