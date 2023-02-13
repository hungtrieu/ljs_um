<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto">
                    <form action="{{ route(admin.users.update) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="shadow sm:overflow-hidden sm:rounded-md">
                          <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-3 gap-6">
                              <div class="col-span-3 sm:col-span-2">
                                <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                  <input type="text" name="name" id="name" value="{{ $user->name }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>
                              </div>
                            </div>

                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                  <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                                  <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="text" name="email" id="email" value="{{ $user->email }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                  </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                  <label class="block text-sm font-medium text-gray-700">{{ __('Permissions') }}</label>
                                  @foreach ($roles as $role)
                                    <div class="form-check">
                                      <input  type="checkbox" value="{{ $role->id }}" name="roles[]"
                                        @if(in_array($role->id, $user_roles))
                                            checked
                                        @endif
                                        class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                      />
                                      <label class="form-check-label inline-block text-gray-800">
                                        {{ $role->name }}
                                      </label>
                                    </div>
                                  @endforeach
                                </div>
                            </div>

                            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">{{ __('Save') }}</button>
                            </div>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>