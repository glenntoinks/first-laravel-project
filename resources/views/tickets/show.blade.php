<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <h1 class="text-white text-lg font-bold">{{ $ticket->title }}</h1>
        <div class="flex flex-col justify-center py-4">
            <a href="{{route('tickets.reply', $ticket->id)}}">
                <x-primary-button class="ml-3">
                    Add a Reply
                </x-primary-button>
            </a>
        </div>
        <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <div class="text-white flex justify-between py-4">
                <p>{{ $ticket->description }}</p>
                @if($ticket->attachments)
                    <a href="{{ "/storage/".$ticket->attachments }}" target="_blank"><u>Attachment</u></a>
                @endif
                <p>{{ $ticket->created_at->diffForHumans() }}</p>
            </div>
        </div>
        @foreach($ticketReplies as $ticketReply)
        <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <div class="text-white flex justify-between py-4">
                <p>{{ $ticketReply->description }}</p>
                @if($ticketReply->attachments)
                    <a href="{{ "/storage/".$ticketReply->attachments }}" target="_blank"><u>Attachment</u></a>
                @endif
                <p>{{ $ticketReply->created_at->diffForHumans() }}</p>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>