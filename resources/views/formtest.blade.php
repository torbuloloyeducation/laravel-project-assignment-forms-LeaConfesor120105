<x-layout>
   @if (session('success'))
        <div class="mb-4 max-w-2xl mx-auto mt-4 rounded-md bg-green-500/20 px-4 py-3 text-sm text-green-400">
            ✅ {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-4 max-w-2xl mx-auto mt-4 rounded-md bg-red-500/20 px-4 py-3 text-sm text-red-400">
            ❌ {{ $errors->first() }}
        </div>
    @endif

    @if (count(session('emails', [])) >= 5)
        <div class="mb-4 max-w-2xl mx-auto mt-4 rounded-md bg-yellow-500/20 px-4 py-3 text-sm text-yellow-400">
            ⚠️ Maximum of 5 emails reached. Delete one to add more.
        </div>
    @endif

    <div class="max-w-2xl mx-auto mt-10 border border-white/20 rounded-xl p-6 bg-gray-800">

    <form method="POST" action="/formtest">
        @csrf
<div class="space-y-12">
    <div class="border-b border-white/10">
      <div class="mt-2 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-12 p-10 bg-gray-800 rounded-lg">
        <div class="sm:col-span-12 flex flex-col items-center">
          <label for="email" class="block text-sm/6 font-medium text-white">Email</label>
          <div class="mt-2 w-full max-w-sm">
            <div class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
              <input id="email" type="email" name="email" placeholder="juandelacruz@umindanao.edu.ph" class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" />
            </div>
            <div class="mt-3 flex items-center gap-x-6 justify-end">
            <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>
            </div>
          </div>
        </div>
      </div>
    </div>
 </form>
      
    <div class="mt-3 p-5">
        <h2 class="text-lg font-semibold text-white">Emails</h2>
        <ul>
            @foreach ($emails as $index => $email)
                <li class="text-sm p-1 flex items-center justify-between text-white">
                    {{ $email }}
                    <form action="/formtest/delete" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="index" value="{{ $index }}">
                        <button type="submit" class="ml-4 text-xs text-red-400 hover:text-red-600">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>

</x-layout>