@extends('layouts.voting')


@section('voting_layout')

<div class="grid grid-cols-3 gap-3">
    <div class="max-w-sm rounded overflow-hidden shadow-lg m-4">
        <img class="w-full" src="{{asset('images/1682976093.jpeg')}}" alt="Candidate 1">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">Candidate 1</div>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Vote</button>
        </div>
    </div>

    <div class="max-w-sm rounded overflow-hidden shadow-lg m-4">
        <img class="w-full" src="{{asset('images/1682976093.jpeg')}}" alt="Candidate 2">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">Candidate 2</div>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Vote</button>
        </div>
    </div>

    <div class="max-w-sm rounded overflow-hidden shadow-lg m-4">
        <img class="w-full" src="candidate3.jpg" alt="Candidate 3">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">Candidate 3</div>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Vote</button>
        </div>
    </div>
</div>




@endsection