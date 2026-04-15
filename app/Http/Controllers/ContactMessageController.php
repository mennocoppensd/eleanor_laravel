<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        try {
            $messages = ContactMessage::query()
                ->latest()
                ->get();
        } catch (\Throwable $e) {
            report($e);

            return view('pages.admin.messages', [
                'messages' => collect(),
                'loadError' => config('app.debug')
                    ? $e->getMessage()
                    : 'Could not load messages from the database. On production, run migrations against the same database as Vercel (php artisan migrate --force) and check DB_* / DATABASE_URL in Vercel Environment Variables.',
            ]);
        }

        return view('pages.admin.messages', [
            'messages' => $messages,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:160'],
            'company' => ['nullable', 'string', 'max:160'],
            'subject' => ['required', 'string', 'max:160'],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
        ]);

        ContactMessage::create($validated);

        return redirect()
            ->route('contact')
            ->with('success', 'Thanks for your message. We will get back to you shortly.');
    }
}
