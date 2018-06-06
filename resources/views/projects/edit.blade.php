@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col m12">
            <h4>Edit Project</h4>

            @include('layouts.errors')

            <form method="POST" action="/projects/edit/{{ $project->id }}">
                @csrf

                <div class="input-field col m12 s12">
                    <input type="text" id="project_name" name="project_name" maxlength="50" value="{{ $project->project_name }}">
                    <label for="project_name">Project Name</label>
                </div>

                <div class="input-field col m12 s12">
                    <select name="customer_id">
                        <option value="" disabled selected>Choose a Customer...</option>
                        @foreach($customers as $customer)

                            <div class="col m3 s12">
                                <label>
                                    <option value="{{ $customer->id }}" {{ $project->customer_id == $customer->id ? 'selected' : '' }}>{{ $customer->customer_name }}</option>
                                </label>
                            </div>

                        @endforeach
                    </select>
                    <label>Customer</label>
                </div>

                <div class="input-field col m6 s12">
                    <input type="text" class="datepicker" name="project_date" id="project_date" value="{{ $project->project_date->toDateString() }}">
                    <label for="project_date">Project Date</label>
                </div>

                <div class="input-field col m6 s12">
                    <input type="text" class="datepicker" name="project_date_completed" id="project_date_completed"  value="{{ ($project->project_date_completed) ? $project->project_date_completed->toDateString() : '' }}">
                    <label for="project_date_completed">Completed Date</label>
                </div>

                <div class="input-field col m12 s12">
                    <select name="project_status">
                        <option value="" disabled selected>Choose a Status...</option>
                        <option value="I" {{ $project->project_status == 'I' ? 'selected' : '' }}>Incomplete</option>
                        <option value="C" {{ $project->project_status == 'C' ? 'selected' : '' }}>Complete</option>
                        <option value="A" {{ $project->project_status == 'A' ? 'selected' : '' }}>Archived</option>
                    </select>
                    <label>Project Status</label>
                </div>

                <div class="col m12 s12">
                    <label>Project Details:</label>
                </div>

                <div class="input-field col m12 s12">
                    <textarea class="tinymce" name="project_details" id="project_details">{{ $project->project_details }}</textarea>
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
                                    <input type="checkbox" name="department[{{ $department->id }}]" id="department_{{ $department->id }}" {{ in_array($department->id, $checked_departments) ? 'checked' : '' }}>
                                    <span>{{ $department->department_name }}</span>
                                </label>
                            </div>

                        @endforeach
                    @endif
                </div>

                <div class="col m12 s12">
                    <label>Assigned User(s):</label>
                </div>

                <div class="input-field col m12 s12">
                    @if($users->isEmpty())
                        Sorry, there are no users.
                    @else
                        @foreach($users as $user)

                            <div class="col m3 s12">
                                <label>
                                    <input type="checkbox" name="user[{{ $user->id }}]" id="user_{{ $user->id }}" {{ in_array($user->id, $checked_users) ? 'checked' : '' }}>
                                    <span>{{ $user->name }}</span>
                                </label>
                            </div>

                        @endforeach
                    @endif

                </div>

                <div class="input-field col m12">
                    <button class="btn btn-primary light-blue darken-2">Save</button>
                </div>

            </form>
        </div>
    </div>

@endsection