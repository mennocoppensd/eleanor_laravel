@extends('layouts.app')

@section('content')
    <section class="hero">
        <h1>Eleanor Consulting - When Results Matter</h1>
        <p>
            Nice to meet you. Eleanor Consulting was founded at the end of 2019 by a handful of driven entrepreneurs
            as a truly human-driven consulting boutique.
        </p>
        <p>
            After a careful six-month preparation period, the company started modestly with dedicated freelancers.
            Today the focus remains the same: be fully dedicated to clients and deliver measurable outcomes.
        </p>
        <a class="cta" href="{{ route('contact') }}">Talk to our team</a>

        <div class="grid">
            <article class="card">
                <h3>Results</h3>
                <p>We focus on practical execution and measurable business impact.</p>
            </article>
            <article class="card">
                <h3>Integrity</h3>
                <p>Transparent collaboration and ownership in every client engagement.</p>
            </article>
            <article class="card">
                <h3>Dialogue</h3>
                <p>Open communication to blend smoothly into your project environment.</p>
            </article>
        </div>
    </section>
@endsection
