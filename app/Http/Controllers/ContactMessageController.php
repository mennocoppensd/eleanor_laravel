<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

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
                'rows' => collect(),
                'loadError' => config('app.debug')
                    ? $e->getMessage()
                    : 'Could not load messages from the database. On production, run migrations against the same database as Vercel (php artisan migrate --force) and check DB_* / DATABASE_URL in Vercel Environment Variables.',
            ]);
        }

        return view('pages.admin.messages', [
            'rows' => $this->contactRowsForDisplay($messages),
        ]);
    }

    /**
     * @param  Collection<int, ContactMessage>  $messages
     * @return Collection<int, array<string, string>>
     */
    private function contactRowsForDisplay(Collection $messages): Collection
    {
        return $messages->map(function (ContactMessage $m) {
            return [
                'created_at' => $m->created_at?->format('Y-m-d H:i') ?? '',
                'name' => $this->scrubUtf8((string) $m->name),
                'email' => $this->scrubUtf8((string) $m->email),
                'company' => $m->company !== null ? $this->scrubUtf8((string) $m->company) : '',
                'subject' => $this->scrubUtf8((string) $m->subject),
                'message' => $this->scrubUtf8((string) $m->message),
            ];
        });
    }

    private function scrubUtf8(string $value): string
    {
        $value = str_replace("\0", '', $value);
        $converted = @iconv('UTF-8', 'UTF-8//IGNORE', $value);

        return $converted !== false ? $converted : $value;
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
