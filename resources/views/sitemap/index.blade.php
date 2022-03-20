<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
    {{-- <loc>{{ url('/') }}/page/{{ $post->url }}</loc> --}}
    <loc>{{ route('home.index') }}</loc>
    <priority>1.0</priority>
  </url>
    @foreach ($categorias as $c)
      <url>
        <loc>{{ route('home.categoria',['c',$c->codigo]) }}</loc>
        <lastmod>{{ $c->created_at->tz('UTC')->toAtomString() }}</lastmod>
        <priority>0.80</priority>
      </url>
    @endforeach
    @foreach ($subcategorias as $s)
    <url>
      <loc>{{ route('home.categoria',['s',$s->codigo]) }}</loc>
      <lastmod>{{ $s->created_at->tz('UTC')->toAtomString() }}</lastmod>
      <priority>0.80</priority>
    </url>
  @endforeach
</urlset>