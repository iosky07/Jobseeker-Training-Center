<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Jadwal Interview') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Jadwal</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.interview.index') }}">Jadwal Interview</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="interview-score" :model="$interview" />
    </div>
</x-app-layout>
