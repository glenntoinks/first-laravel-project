<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <h1 class="text-white text-lg font-bold">Add a Reply</h1>
        <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <form method="POST" action="{{ route('tickets.savereply', $ticket->id) }}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="mt-4">
                    <x-input-label for="description" :value="__('Description')" />
                    <x-textarea default="" placeholder="Add description" name="description" id="description" value="" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="attachment" :value="__('Attachment (if any)')" />
                    <x-file-input name="attachment" id="attachment" />
                    <x-input-error :messages="$errors->get('attachment')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-3">
                        Create
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>