<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>
          @if (!empty($route))
            <a href="{{ $route }}" class="text-{{ $color ?? 'primary' }}"><i class="fas fa-chevron-circle-left"></i></a>
          @endif
          <i class="{{ $icon ?? '' }}"></i> {!! $body !!}
        </h3>
        @if (!empty($text))
          <p class="text-subtitle text-muted">{{ $text }}</p>
        @endif
      </div>
    </div>
  </div>