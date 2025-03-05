<div>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Profile Information
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Update your account&#039;s profile information and email address.
        </p>
        <a href="{{route('user_list')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Chat</a>
    </header>

    <form wire:submit="insert" class="mt-6 space-y-6">
        <div>
            @if(session()->has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="name">
                Name
            </label>
            <input
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full"
                wire:model="name" id="name" name="name" type="text" required="required" autofocus="autofocus"
                autocomplete="name">
           {{$name}}
        </div>

        <div>
            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="email">
                Email
            </label>
            <input
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full"
                wire:model="email" id="email" name="email" type="email" required="required"
                autocomplete="username">
        </div>

        <div>
            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="password">
                Password
            </label>
            <input
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full"
                wire:model="password" id="password" name="password" type="password" required="required"
                autocomplete="Password">
        </div>

        <div class="flex items-center gap-4">
            <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                Save
            </button>
        </div>
    </form>

    <h1>{{count($users)}}</h1>
    <button wire:click="increment"
                class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                increment
            </button>
    <button wire:click="decrement"
                class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                decrement
            </button>

            <span>{{$count}}</span>

</div>
