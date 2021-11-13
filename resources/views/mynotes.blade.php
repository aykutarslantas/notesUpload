<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard for User') }}
        </h2>
    </x-slot>

</x-app-layout>


<div class="container">
    <div class="row">
        <div class="table-responsive">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Notes</th>
                    <th scope="col">Image</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Updated at</th>
                    <th scope="col">Change</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($notes as $note)
                    <tr>
                        <th scope="row">{{$note->id}}</th>
                        <td>{{$note->notes}}</td>
                        <td><img src="/uploads/{{$note->image}}" class="img-fluid" style="max-height: 100px"></td>
                        <td>{{$note->created_at}}</td>
                        <td>{{$note->updated_at}}</td>
                        <td><a href="{{ route('login') }}" class="btn btn-sm btn-warning">Change</a></td>
                        <td><a href="{{ route('dashboard.deleteNote',['id' => $note->id]) }}" class="btn btn-sm btn-danger">Delete</a></td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
