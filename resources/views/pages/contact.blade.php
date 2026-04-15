@extends('layouts.app')

@section('content')
    <section class="content-card">
        <h1>Contact</h1>
        <p>
            Want to discuss ICT consulting or MarCom consulting support? Share your request below and we will
            get back to you.
        </p>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">
                Please review the form and fix the highlighted fields.
            </div>
        @endif

        <form action="{{ route('contact.store') }}" method="POST">
            @csrf
            <div class="form-grid">
                <div class="form-field">
                    <label for="name">Name *</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" required>
                    @error('name')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="email">Email *</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-grid">
                <div class="form-field">
                    <label for="company">Company</label>
                    <input id="company" name="company" type="text" value="{{ old('company') }}">
                    @error('company')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="subject">Subject *</label>
                    <input id="subject" name="subject" type="text" value="{{ old('subject') }}" required>
                    @error('subject')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-field">
                <label for="message">Message *</label>
                <textarea id="message" name="message" required>{{ old('message') }}</textarea>
                @error('message')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <button class="cta" type="submit">Send message</button>
            <p class="form-note">You can also email us directly at contact@eleanorconsulting.be.</p>
        </form>
    </section>
@endsection
