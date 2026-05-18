{{-- resources/views/leaderboard/index.blade.php --}}
@extends('layouts.app')
@section('title', 'Classement')

@section('content')
<div class="fade-in">

    {{-- En-tête --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-bold">🏆 Classement</h1>
            <p class="text-sm mt-1" style="color:var(--muted)">
                Meilleur score par étudiant — tous quiz confondus
            </p>
        </div>
        {{-- Filtre par quiz --}}
        <form method="GET" action="{{ route('leaderboard.index') }}" class="flex items-center gap-2">
            <select name="quiz_id" onchange="this.form.submit()"
                    class="text-sm border rounded-lg px-3 py-2 focus:outline-none focus:ring-2"
                    style="border-color:var(--border); color:var(--text)">
                <option value="">Tous les quiz</option>
                @foreach($quizzes as $quiz)
                    <option value="{{ $quiz->id }}" {{ request('quiz_id') == $quiz->id ? 'selected' : '' }}>
                        {{ $quiz->title }}
                    </option>
                @endforeach
            </select>
        </form>
    </div>

    {{-- Podium Top 3 --}}
    @if($leaderboard->count() >= 3)
    <div class="grid grid-cols-3 gap-4 mb-8 max-w-lg mx-auto">
        {{-- 2ème place --}}
        <div class="card p-4 text-center flex flex-col items-center justify-end" style="padding-top:2rem">
            <div class="w-12 h-12 rounded-full flex items-center justify-center font-bold text-lg mb-2"
                 style="background:#E2E8F0; color:#64748B">
                {{ strtoupper(substr($leaderboard[1]->user->name, 0, 1)) }}
            </div>
            <p class="text-xs font-semibold truncate w-full text-center">{{ $leaderboard[1]->user->name }}</p>
            <p class="mono font-bold text-sm" style="color:var(--muted)">{{ $leaderboard[1]->best_score }} pts</p>
            <div class="w-full rounded-t-lg mt-2 flex items-center justify-center text-2xl font-black"
                 style="background:#CBD5E1; height:60px; color:#475569">2</div>
        </div>
        {{-- 1ère place --}}
        <div class="card p-4 text-center flex flex-col items-center justify-end" style="padding-top:1rem; border-color:#FCD34D">
            <div class="text-2xl mb-1">👑</div>
            <div class="w-14 h-14 rounded-full flex items-center justify-center font-bold text-xl mb-2"
                 style="background:#FEF3C7; color:#92400E; border:3px solid #FCD34D">
                {{ strtoupper(substr($leaderboard[0]->user->name, 0, 1)) }}
            </div>
            <p class="text-xs font-semibold truncate w-full text-center">{{ $leaderboard[0]->user->name }}</p>
            <p class="mono font-bold" style="color:var(--warn)">{{ $leaderboard[0]->best_score }} pts</p>
            <div class="w-full rounded-t-lg mt-2 flex items-center justify-center text-2xl font-black"
                 style="background:#FCD34D; height:80px; color:#78350F">1</div>
        </div>
        {{-- 3ème place --}}
        <div class="card p-4 text-center flex flex-col items-center justify-end" style="padding-top:2.5rem">
            <div class="w-12 h-12 rounded-full flex items-center justify-center font-bold text-lg mb-2"
                 style="background:#FEF3C7; color:#92400E">
                {{ strtoupper(substr($leaderboard[2]->user->name, 0, 1)) }}
            </div>
            <p class="text-xs font-semibold truncate w-full text-center">{{ $leaderboard[2]->user->name }}</p>
            <p class="mono font-bold text-sm" style="color:var(--muted)">{{ $leaderboard[2]->best_score }} pts</p>
            <div class="w-full rounded-t-lg mt-2 flex items-center justify-center text-2xl font-black"
                 style="background:#D97706; height:50px; color:white">3</div>
        </div>
    </div>
    @endif

    {{-- Tableau complet --}}
    <div class="card overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr style="background:#F8FAFC; border-bottom:1px solid var(--border)">
                    <th class="px-5 py-3 text-left font-semibold" style="color:var(--muted)">#</th>
                    <th class="px-5 py-3 text-left font-semibold" style="color:var(--muted)">Étudiant</th>
                    <th class="px-5 py-3 text-left font-semibold" style="color:var(--muted)">Meilleur score</th>
                    <th class="px-5 py-3 text-left font-semibold hidden sm:table-cell" style="color:var(--muted)">Tentatives</th>
                    <th class="px-5 py-3 text-left font-semibold hidden md:table-cell" style="color:var(--muted)">Moyenne</th>
                </tr>
            </thead>
            <tbody>
                @forelse($leaderboard as $index => $entry)
                <tr class="border-b transition-colors hover:bg-indigo-50/30"
                    style="border-color:var(--border); {{ auth()->id() == $entry->user_id ? 'background:#EEF2FF' : '' }}">
                    <td class="px-5 py-4">
                        @if($index === 0)
                            <span class="text-xl">🥇</span>
                        @elseif($index === 1)
                            <span class="text-xl">🥈</span>
                        @elseif($index === 2)
                            <span class="text-xl">🥉</span>
                        @else
                            <span class="font-bold mono" style="color:var(--muted)">{{ $index + 1 }}</span>
                        @endif
                    </td>
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full flex items-center justify-center font-bold text-sm shrink-0"
                                 style="background:#EEF2FF; color:var(--primary)">
                                {{ strtoupper(substr($entry->user->name, 0, 1)) }}
                            </div>
                            <div>
                                <p class="font-medium">
                                    {{ $entry->user->name }}
                                    @if(auth()->id() == $entry->user_id)
                                        <span class="badge ml-1" style="background:#EEF2FF; color:var(--primary)">Vous</span>
                                    @endif
                                </p>
                                <p class="text-xs" style="color:var(--muted)">{{ $entry->user->email }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-4">
                        <span class="mono font-bold text-base" style="color:var(--primary)">{{ $entry->best_score }}</span>
                        <span class="text-xs" style="color:var(--muted)"> pts</span>
                    </td>
                    <td class="px-5 py-4 hidden sm:table-cell" style="color:var(--muted)">
                        {{ $entry->attempts_count }}
                    </td>
                    <td class="px-5 py-4 hidden md:table-cell">
                        <span class="mono" style="color:var(--muted)">{{ round($entry->avg_score, 1) }} pts</span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-5 py-10 text-center" style="color:var(--muted)">
                        Aucun résultat pour l'instant.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection