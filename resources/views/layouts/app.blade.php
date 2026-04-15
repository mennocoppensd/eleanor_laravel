<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Eleanor Consultancy' }}</title>
    <style>
        :root {
            --bg: #f6f8fb;
            --text: #1e293b;
            --muted: #475569;
            --primary: #1d4ed8;
            --primary-dark: #1e40af;
            --card: #ffffff;
            --border: #dbe2ea;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
        }

        .container {
            width: min(1080px, 92%);
            margin: 0 auto;
        }

        header {
            background: #ffffff;
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
        }

        .brand {
            font-size: 1.35rem;
            font-weight: 700;
            color: var(--primary-dark);
            text-decoration: none;
        }

        nav {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        nav a {
            color: var(--muted);
            text-decoration: none;
            padding: 0.45rem 0.7rem;
            border-radius: 8px;
            font-size: 0.95rem;
        }

        nav a.active {
            background: #eaf1ff;
            color: var(--primary-dark);
            font-weight: 600;
        }

        main {
            padding: 3rem 0;
        }

        .hero,
        .content-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 2rem;
        }

        .hero h1,
        .content-card h1 {
            margin-top: 0;
            font-size: 2rem;
        }

        .hero p,
        .content-card p,
        .content-card li {
            color: var(--muted);
            line-height: 1.65;
        }

        .cta {
            margin-top: 1.5rem;
            display: inline-block;
            background: var(--primary);
            color: #ffffff;
            text-decoration: none;
            padding: 0.7rem 1rem;
            border-radius: 8px;
            font-weight: 600;
        }

        .grid {
            margin-top: 1.5rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1rem;
        }

        .card {
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 1rem;
            background: #ffffff;
        }

        .card h3 {
            margin-top: 0;
            margin-bottom: 0.4rem;
        }

        .alert {
            border-radius: 10px;
            padding: 0.8rem 1rem;
            margin: 0.75rem 0 1rem;
            font-size: 0.95rem;
        }

        .alert-success {
            border: 1px solid #b7efc5;
            background: #ebfff1;
            color: #156235;
        }

        .alert-error {
            border: 1px solid #fecaca;
            background: #fff1f2;
            color: #9f1239;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 0.9rem;
            margin-top: 1rem;
        }

        .form-field {
            margin-bottom: 0.9rem;
        }

        .form-field label {
            display: block;
            margin-bottom: 0.35rem;
            font-weight: 600;
            color: var(--text);
        }

        .form-field input,
        .form-field textarea {
            width: 100%;
            border: 1px solid var(--border);
            border-radius: 8px;
            font: inherit;
            padding: 0.6rem 0.7rem;
            color: var(--text);
            background: #ffffff;
        }

        .form-field textarea {
            min-height: 140px;
            resize: vertical;
        }

        .form-field .error {
            display: block;
            margin-top: 0.35rem;
            color: #9f1239;
            font-size: 0.85rem;
        }

        .form-note {
            margin-top: 0.5rem;
            font-size: 0.9rem;
            color: var(--muted);
        }

        .table-wrap {
            overflow-x: auto;
            border: 1px solid var(--border);
            border-radius: 10px;
            margin-top: 1rem;
            background: #ffffff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            text-align: left;
            padding: 0.75rem;
            border-bottom: 1px solid var(--border);
            vertical-align: top;
            font-size: 0.92rem;
        }

        th {
            background: #f8fafc;
            color: var(--text);
        }

        .empty-state {
            color: var(--muted);
            margin-top: 0.8rem;
        }

        footer {
            border-top: 1px solid var(--border);
            padding: 1rem 0 2rem;
            color: var(--muted);
            font-size: 0.92rem;
            text-align: center;
        }
    </style>
</head>
<body>
<header>
    <div class="container topbar">
        <a href="{{ route('home') }}" class="brand">Eleanor</a>
        <nav>
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About us</a>
            <a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'active' : '' }}">Services</a>
            <a href="{{ route('careers') }}" class="{{ request()->routeIs('careers') ? 'active' : '' }}">Careers</a>
            <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
            <a href="{{ route('admin.messages') }}" class="{{ request()->routeIs('admin.messages') ? 'active' : '' }}">Messages</a>
        </nav>
    </div>
</header>

<main>
    <div class="container">
        @yield('content')
    </div>
</main>

<footer>
    <div class="container">
        Eleanor Consulting - When Results Matter.
    </div>
</footer>
</body>
</html>
