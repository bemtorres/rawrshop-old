@if (count($t->present()->getBanner()) > 0)
<div class="">
  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      @php $count_img = 0; @endphp @foreach ($t->present()->getBanner() as $key => $value) @continue(!$value['enabled'])
      <div class="carousel-item {{ $count_img == 0 ? 'active' : '' }}">
        <img loading="lazy" src="{{ !$isMobile ? asset($value['data']) : asset($value['data_mobile']) }}" class="d-block w-100 img-fluid" width="100%" alt="{{ $value['title'] }}">
      </div>
      @php $count_img++; @endphp @endforeach
    </div>
    @if ($count_img > 1)
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button> @endif
  </div>
</div>
@endif