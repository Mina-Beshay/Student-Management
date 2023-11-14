@extends('students.layout')
@section('content')
    @if(app()->getLocale()==='en')
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <form action="{{route('search')}}" method="POST">
                        @csrf
                        <br>
                        <div class="container">
                                            <label for="date" class="col-form-label-md ">{{__('Date Of Birth From')}}</label>
                                            <input type="date" class="from-control input-sm" id="fromDate" name="fromDate" required>
                                            <label for="date" class="col-form-label-md ">{{__('Date Of Birth to')}}</label>
                                            <input type="date" class="from-control input-sm" id="toDate" name="toDate" required>
                                            <button style="margin-top: -3px" type="submit" class="btn btn-primary btn-sm"  name="search" title="Search">{{__('search')}}</button>
                                        </div>

                        <br>
                    </form>
                </div>
                <div class="col-md-4" style="margin-top:25px " >
                    <form action="{{route('searchAll')}}" method="POST" role="search">
                        @csrf
                        <div class="container">
                                <input type="text" class="from-control input-sm" id="search-all" name="search_all" required placeholder="{{__('Search for All')}}">
                                <button style="margin-top: -3px" type="submit" class="btn btn-primary btn-sm " name="search" title="Search">{{__('search')}}</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="switch" style="float: right;">
                            @include('partials.language_switcher')
                        </div>
                        <h2>{{__('Student Dashboard')}}</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/Student/Add') }}" class="btn btn-success btn-sm" title="Add New Student">
                            <i class="fa fa-plus" aria-hidden="true"></i> {{__('Add New Student')}}
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table" name="students">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('phone')}}</th>
                                    <th>{{__('Class')}}</th>
                                    <th>{{__('Marks')}}</th>
                                    <th>{{__('Birth-date')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($students->count()==0)
                                    <tr>
                                        <th style="text-align: center" colspan="6">No Students Data</th>
                                    </tr>
                                @else
                                @foreach($students as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->class }}</td>
                                        <td>{{ $item->marks }}</td>
                                        <td>{{ $item->birth_date }}</td>
                                        <td>
                                            <a href="{{ url('/Student/Edit/' . $item->id ) }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{__('Edit')}}</button></a>
                                            <a onclick="return confirm('Confirm delete ? ')" href="{{ url('/Student/Delete/'. $item->id) }}" title="DELETE Student"><button class="btn btn-danger btn-sm" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{__('Delete')}}</button></a>

                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
        <div class="container " dir="rtl">
            <div class="row">
                <div class="col-md-8">
                    <form action="{{route('search')}}" method="POST">
                        @csrf
                        <br>
                        <div class="container">
                            <div class="container.fluid">
                                <div class="row">
                                    <div class="form-group row">
                                        <div class="row-end-2">
                                            <label for="date" class="col-form-label-md ">{{__('Date Of Birth From')}}</label>
                                            <input type="date" class="from-control input-sm" id="fromDate" name="fromDate" required>
                                            <label for="date" class="col-form-label-md ">{{__('Date Of Birth to')}}</label>
                                            <input type="date" class="from-control input-sm" id="toDate" name="toDate" required>
                                            <button style="margin-top: -3px" type="submit" class="btn btn-primary btn-sm" name="search" title="Search">{{__('search')}}</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </form>
                </div>
                <div class="col-md-4" style="margin-top:25px " >
                    <form action="{{route('searchAll')}}" method="POST" role="search">
                        @csrf
                        <div class="container">
                            <div class="row-end-2">
                                <input type="text" class="from-control input-sm" id="search-all" name="search_all" required placeholder="{{__('Search for All')}}">
                                <button style="margin-top: -3px" type="submit" class="btn btn-primary btn-sm " name="search" title="Search">{{__('search')}}</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <div class="container" dir="rtl">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="switch" style="float: left;">
                                @include('partials.language_switcher')
                            </div>
                            <h2>{{__('Student Dashboard')}}</h2>
                        </div>
                        <div class="card-body">
                            <a href="{{ url('/Student/Add') }}" class="btn btn-success btn-sm" title="Add New Student">
                                <i class="fa fa-plus" aria-hidden="true"></i> {{__('Add New Student')}}
                            </a>
                            <br/>
                            <br/>
                            <div class="table-responsive">
                                <table class="table" name="students">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('Name')}}</th>
                                        <th>{{__('phone')}}</th>
                                        <th>{{__('Class')}}</th>
                                        <th>{{__('Marks')}}</th>
                                        <th>{{__('Birth-date')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($students as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->class }}</td>
                                            <td>{{ $item->marks }}</td>
                                            <td>{{ $item->birth_date }}</td>

                                            <td>
                                                <a href="{{ url('/Student/Edit/' . $item->id ) }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{__('Edit')}}</button></a>
                                                <a onclick="return confirm('{{__('Confirm delete ?')}}  ')" href="{{ url('/Student/Delete/'. $item->id) }}" title="DELETE Student"><button class="btn btn-danger btn-sm" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{__('Delete')}}</button></a>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
