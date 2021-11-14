@extends('layouts.app')
@section('content')
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
                        <th scope="col">Share</th>
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
                            <td><a href="{{ route('dashboard.changeNoteRequest',['id' => $note->id]) }}" class="btn btn-sm btn-warning">Change</a></td>
                            <td><a href="{{ route('dashboard.deleteNote',['id' => $note->id]) }}" class="btn btn-sm btn-danger">Delete</a></td>
                            <td><a href="{{ route('share',['id' => $note->id]) }}" class="btn btn-sm btn-primary">Share</a></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
