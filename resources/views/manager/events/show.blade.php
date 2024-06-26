<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            イベント詳細
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="max-w-2xl mx-auto py-4">
                    <x-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
        
                <form method="get" action="{{ route('events.edit', ['event' => $event->id ]) }}">
        
                    <div>
                        <x-label for="event_name" value="イベント名" />
                        {{ $event->name }}
                    </div>

                    <div class="mt-4">
                        <x-label for="information" value="イベント詳細" />
                        {!! nl2br(e($event->information)) !!}
                    </div>

                <div class="md:flex justify-between">
                    <div class="mt-4">
                        <x-label for="event_date" value="イベント日付" />
                        {{ $event->eventDate }}
                    </div>

                    <div class="mt-4">
                        <x-label for="start_time" value="開始時間" />
                        {{ $event->startTime }}
                    </div>

                    <div class="mt-4">
                        <x-label for="end_time" value="終了時間" />
                        {{ $event->endTime }}
                    </div>

                </div>
                <div class="md:flex justify-between items-end">
                    <div class="mt-4">
                        <x-label for="max_people" value="定員数" />
                        {{ $event->max_people }}
                    </div>
                    <div class="flex space-x-4 justify-around">
                        @if($event->is_visible)
                            表示中
                        @else
                            非表示
                        @endif
                    </div>
                    @if ($event->eventDate >= \Carbon\Carbon::today()->format('Y年m月d日'))
                    <x-button class="ms-4">
                        編集する
                    </x-button>
                    @endif
                </div>
                </form>
                </div>
            </div>
         </div>
    </div>
</x-app-layout>