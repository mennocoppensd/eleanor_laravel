@extends('layouts.app')

@section('content')
    <section class="content-card">
        <h1>Contact messages</h1>
        <p>Overview of all messages sent through the contact form.</p>

        @isset($loadError)
            <div class="alert alert-error">
                {{ $loadError }}
            </div>
        @endisset

        @if($messages->isNotEmpty())
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Company</th>
                            <th>Subject</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($messages as $message)
                            <tr>
                                <td>{{ $message->created_at?->format('Y-m-d H:i') }}</td>
                                <td>{{ $message->name }}</td>
                                <td><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></td>
                                <td>{{ $message->company ?: '-' }}</td>
                                <td>{{ $message->subject }}</td>
                                <td>{{ $message->message }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @elseif(! isset($loadError))
            <p class="empty-state">No messages yet. Submit the contact form to see entries here.</p>
        @endif
    </section>
@endsection
