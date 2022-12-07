<?xml version="1.0" encoding="UTF-8"?>
<urlset
    xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

    <url>
        <loc>{{ route('homepage') }}</loc>
        <lastmod>{{ now()->startOfMonth()->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1.00</priority>
    </url>

    @foreach ($tools as $tool => $_)
        <url>
            <loc>{{ route('tools.' . $tool) }}</loc>
            <lastmod>{{ now()->startOfMonth()->toAtomString() }}</lastmod>
            <priority>0.80</priority>
        </url>
    @endforeach
</urlset>
