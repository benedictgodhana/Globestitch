<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $blog->title }} - GlobeStitch Blogs</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.js" defer></script>
    <style>
        body {
            margin: 0;
            font-family: 'Figtree', sans-serif;
            background-color: #f9fafb;
            color: #1F2937;
            line-height: 1.6;
        }

        .blog-header {
            position: relative;
            text-align: center;
            padding: 8rem 1rem;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                        url('{{ asset("storage/" . $blog->image) }}') center/cover no-repeat;
            color: white;
        }

        .blog-content {
            max-width: 800px;
            margin: 3rem auto;
            padding: 0 2rem;
            background: white;
            border-radius: 15px;
            padding: 2rem;
        }

        .blog-title {
            font-size: 2.5rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 1rem;
        }

        .blog-meta {
            text-align: center;
            color: #6B7280;
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
        }

        .blog-meta span {
            margin-right: 10px;
        }

        .blog-body {
            font-size: 1.2rem;
            color: #374151;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 2rem;
            font-weight: 600;
            color: #3B82F6;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .back-link:hover {
            color: green;
        }
    </style>
</head>
<body>
    @include('layouts.navigation')

    <header class="blog-header">
        <h1 class="blog-title">{{ $blog->title }}</h1>
    </header>

    <section class="blog-content">
        <p class="blog-meta">
            <span>{{ \Carbon\Carbon::parse($blog->created_at)->format('F d, Y') }}</span>
        </p>

        <div class="blog-body">
            {!! nl2br(e($blog->description)) !!}
        </div>

        <a href="/blog" class="back-link">← Back to Blogs</a>
    </section>

    @include('layouts.footer')
</body>
</html>
