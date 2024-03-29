@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col m12">
            <h4>Edit User</h4>

            @include('layouts.errors')

            <form method="POST" action="/users/edit/{{ $user->id }}">

                {{ csrf_field() }}

                <div class="input-field col m12 s12">
                    <input type="text" id="name" name="name" value="{{ $user->name }}">
                    <label for="name">Name</label>
                </div>

                <div class="input-field col m12 s12">
                    <input type="email" id="email" name="email" value="{{ $user->email }}">
                    <label for="email">Email Address</label>
                </div>

                <div class="col m12 s12">
                    <label>Assigned Department(s):</label>
                </div>

                <div class="input-field col m12 s12">
                    @if($departments->isEmpty())
                        Sorry, there are no departments.
                    @else
                        @foreach($departments as $department)

                            <div class="col m3 s12">
                                <label>
                                    <input type="checkbox" name="department[{{ $department->id }}]" id="department_{{ $department->id }}" {{ $user->departments->contains($department->id) ? 'checked' : '' }}>
                                    <span>{{ $department->department_name }}</span>
                                </label>
                            </div>

                        @endforeach
                    @endif
                </div>

                <div class="col m12 s12">
                    <button class="btn light-blue darken-2">Save</button>
                </div>

            </form>
        </div>
    </div>

@endsection