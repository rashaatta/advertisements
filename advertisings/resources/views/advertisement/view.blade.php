@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$advertisement->name}}</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <td width="30%">Name</td>
                            <td> {{$advertisement->name}}</td>
                        </tr>
                        <tr>
                            <td>From</td>
                            <td> {{$advertisement->from->format('Y-m-d')}}</td>
                        </tr>
                        <tr>
                            <td>To</td>
                            <td> {{$advertisement->to->format('Y-m-d')}}</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td> {{$advertisement->total}}</td>
                        </tr>
                        <tr>
                            <td>Budget</td>
                            <td> {{$advertisement->daily_budget}}</td>
                        </tr>
                        </tbody>

                    </table>
                </div>
            </div>


            <div class="card">
                <div class="card-header">Images</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                        @foreach($advertisement->images as $image)
                            <tr>
                                <td>
                                    @if($image->mime_type ==='image/gif'  || $image->mime_type === 'image/jpeg' || $image->mime_type==='image/png')
                                        <img src="{{ url('storage/advertisement/'.$image->file_name) }}"
                                             style="height: 100px; width: 150px;">
                                    @elseif($image->mime_type  == "application/pdf")
                                        <iframe src="{{ url('storage/advertisement/'.$image->file_name) }}" width="90%"
                                                height="300px" role="document"></iframe>
                                    @else
                                        <span>{{$image->file_name}}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
