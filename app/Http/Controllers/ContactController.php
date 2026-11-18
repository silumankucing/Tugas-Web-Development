<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Halaman Contact: informasi kontak + form pesan.
 */
class ContactController extends Controller
{
    /**
     * Tampilkan informasi kontak dan form.
     */
    public function index(): View
    {
        return view('contact', [
            'owner' => config('site.owner'),
            'channels' => config('site.contact_channels'),
        ]);
    }

    /**
     * Validasi lalu simpan pesan pengunjung.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:80'],
            'email' => ['required', 'string', 'email', 'max:120'],
            'subject' => ['required', 'string', 'min:3', 'max:120'],
            'message' => ['required', 'string', 'min:10', 'max:2000'],
        ], [
            'name.required' => 'Nama wajib diisi.',
            'name.min' => 'Nama minimal 2 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'subject.required' => 'Subjek wajib diisi.',
            'subject.min' => 'Subjek minimal 3 karakter.',
            'message.required' => 'Pesan wajib diisi.',
            'message.min' => 'Pesan minimal 10 karakter.',
            'message.max' => 'Pesan maksimal 2000 karakter.',
        ]);

        ContactMessage::query()->create([
            ...$validated,
            'ip_address' => $request->ip(),
        ]);

        return redirect()
            ->route('contact.index')
            ->with('success', 'Terima kasih, '.$validated['name'].'! Pesan Anda sudah tersimpan. Saya akan membalas melalui email secepatnya.');
    }
}
