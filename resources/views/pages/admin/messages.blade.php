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

        @if(isset($rows) && $rows->isNotEmpty())
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
                        @foreach($rows as $row)
                            <tr>
                                <td>{{ $row['created_at'] }}</td>
                                <td>{{ $row['name'] }}</td>
                                <td><a href="mailto:{{ $row['email'] }}">{{ $row['email'] }}</a></td>
                                <td>{{ $row['company'] !== '' ? $row['company'] : '-' }}</td>
                                <td>{{ $row['subject'] }}</td>
                                <td>{{ $row['message'] }}</td>
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
