@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped">
                            <tr>
                                <th>Todo</th>
                                <th>Deadline</th>
                            </tr>
                            @forelse ($todo_list as $todo)   
                            <tr>
                                <td>
                                    {{ $todo->content }}
                                </td>
                                <td>
                                    {{Carbon\Carbon::parse($todo->deadline)->timezone(auth()->user()->timezone)->format('g A, jS F')}}
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="1">There is no data.</td>
                                </tr>
                            @endforelse
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
