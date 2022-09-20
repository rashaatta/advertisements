@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Advertisement</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Total</th>
                            <th>Budget</th>
                            <th class="tbl-btns-align">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($advertisements as $advertisement)
                            <tr>
                                <td>{{ $advertisement->name }}</td>
                                <td>{{ $advertisement->from->format('Y-m-d') }}</td>
                                <td>{{ $advertisement->to->format('Y-m-d') }}</td>
                                <td>{{ $advertisement->total }}</td>
                                <td>{{ $advertisement->daily_budget }}</td>
                                <td class="tbl-btns-align">
                                    <a class="btn btn-info  btn-sm" href="{{ url('/advertisements/'.$advertisement->id) }}">View/Edit</a>
                                    <a class="btn btn-danger btn-sm" href="#">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
