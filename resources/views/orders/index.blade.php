@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-center min-h-screen">
        <h1 class="text-3xl font-extrabold text-secondary-dark mx-auto mb-4 w-1/4 text-left">Commander</h1>
        <div class="mx-auto w-1/4">
            <form method="POST" action="/orders/pay">
                @csrf
                <div>
                    <label class="block uppercase tracking-wide text-secondary-dark text-xs font-bold mb-4" for="item">
                        Article
                    </label>
                    <input name="item" id="item" type="text" required="required" autofocus="autofocus" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-secondary-dark block mt-1 w-full">
                </div>
                <div class="mt-4">
                    <label class="block uppercase tracking-wide text-secondary-dark text-xs font-bold mb-2" for="price">
                        Montant
                    </label>
                    <input name="price" id="price" type="number" required="required" autofocus="autofocus" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-secondary-dark block mt-1 w-full">
                </div>
                <div class="mt-4">
                    <button class="py-2 px-4 text-white bg-secondary-dark hover:bg-secondary rounded">
                        Let's go
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
