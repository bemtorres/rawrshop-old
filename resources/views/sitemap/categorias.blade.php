<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($categorias as $c)
        <url>
            {{-- <loc>{{ url('/') }}/page/{{ $post->url }}</loc> --}}
            <loc>{{ route('home.categoria',['c',$c->codigo]) }}</loc>
            <lastmod>{{ $c->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
</urlset>