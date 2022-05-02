<div class="bg-white fixed bottom-0 right-4 w-96 py-8 px-4 shadow-xl sm:rounded-lg sm:px-10">
    <h2 class="text-xl font-semibold text-gray-900">Translation Manager</h2>

    <form class="space-y-6" action="{{ route('translation-manager.translations.store') }}" method="POST">
        @csrf

        <input type="hidden" name="route_path" value="{{ request()->path() }}">
        <div>
            <label for="from" class="block text-sm font-medium text-gray-700"> Target Text </label>
            <div class="mt-1">
                <input id="from" name="from" type="text" value="{{ old('from') }}" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <p class="mt-1 text-sm text-red-700">{{ $errors->first('from') }}</p>
        </div>

        <div>
            <label for="to" class="block text-sm font-medium text-gray-700"> Replacement Text </label>
            <div class="mt-1">
                <input id="to" name="to" type="text" value="{{ old('to') }}" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <p class="mt-1 text-sm text-red-700">{{ $errors->first('to') }}</p>
        </div>

        <div>
            <label for="key" class="block text-sm font-medium text-gray-700"> Swap english key text to</label>
            <div class="mt-1">
                <input id="key" name="key" type="text" value="{{ old('key') }}" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <p class="mt-1 text-sm text-red-700">{{ $errors->first('key') }}</p>
        </div>

        @if(session('translation.saved'))
            <p class="text-green-600 text-sm">{{ session('translation.saved') }}</p>
        @endif

        <div>
            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Submit
            </button>
        </div>
    </form>
</div>
