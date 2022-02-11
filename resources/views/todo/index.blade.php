@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Todo List</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('todo.store') }}" method="post" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="text" name="content" class="form-control" placeholder="Add your new todo">
                                    @error('content')
                                        <p class="text-error text-small">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker1'>
                                            <input type='text' name="deadline" class="form-control" placeholder="Select deadline date"/>
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                    @error('deadline')
                                        <p class="text-error text-small">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-2 text-right">
                                    <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-plus"></span></button>
                                </div>
                            </div>                    
                            </form>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped">
                            <tr>
                                <th>Todo</th>
                                <th>Deadline</th>
                                <th></th>
                            </tr>
                            @forelse ($todo_list as $todo)   
                            <tr>
                                <td>
                                    {{ $todo->content }}
                                </td>
                                <td>
                                    {{Carbon\Carbon::parse($todo->deadline)->timezone(auth()->user()->timezone)->format('g A, jS F')}}
                                </td>
                                <td>
                                    <form action="{{ route('todo.destroy', $todo) }}" method="POST" >
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit"><span class="glyphicon glyphicon-trash"></span></button>                                            
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="3">There is no data.</td>
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

@push('scripts')
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: "DD-MM-YYYY LT"
        });
    });
</script>
@endpush
