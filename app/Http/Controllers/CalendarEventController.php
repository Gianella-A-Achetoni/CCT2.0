<?php

namespace App\Http\Controllers;

use App\Models\CalendarEvent;
use Illuminate\Http\Request;

class CalendarEventController extends Controller
{
    public function index()
    {
        $events = CalendarEvent::query()
            ->orderBy('start_at')
            ->get();

        return view('admin.update', compact('events'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'start_at' => ['required', 'date'],
            'end_at' => ['nullable', 'date', 'after_or_equal:start_at'],
        ]);

        CalendarEvent::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'start_at' => $validated['start_at'],
            'end_at' => $validated['end_at'] ?? null,
            'created_by' => optional($request->user())->id,
        ]);

        return back()->with('status', 'Evento creado.');
    }

    public function destroy(CalendarEvent $event)
    {
        $event->delete();

        return back()->with('status', 'Evento eliminado.');
    }

    public function feed()
    {
        $events = CalendarEvent::query()
            ->orderBy('start_at')
            ->get()
            ->map(function (CalendarEvent $event) {
                return [
                    'id' => $event->id,
                    'title' => $event->title,
                    'start' => optional($event->start_at)->toIso8601String(),
                    'end' => optional($event->end_at)->toIso8601String(),
                    'descrip' => $event->description,
                ];
            });

        return response()->json($events);
    }
}
