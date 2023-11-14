@extends('students.layout')
@section('content')
    @if($errors->any())
        <div class=" container col-md-5">
        <ul class="alert alert-warning">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        </div>
    @endif
    @if(app()->getLocale()==='en')
        <div class="container col-md-5">
    <div class="card">

        <div class="card-header">
            <div class="switch" style="float: right;">
                @include('partials.language_switcher')
            </div>
            <h2>{{__('Create Student')}}</h2>
        </div>
            <div class="card-body">
                <form action="{{url('Student/Add')}}" method="post">
                    {{csrf_field()}}
                    <label >{{__('Name')}}</label><br>
                    <input type="text" name="name" id="name" class="form-control"  ><br>
                    <label>{{__('phone')}}</label><br>
                    <input type="text"  name="phone" id="phone" class="form-control"  ><br>
                    <label>{{__('Class')}}</label><br>
                    <input type="text" name="class" id="class" class="form-control"   ><br>
                    <label>{{__('Marks')}}</label><br>
                    <input type="text" name="marks" id="marks" class="form-control" ><br>
                    <label>{{__('Birth-date')}}</label><br>
                    <input type="date" name="birth_date" id="birth_date" class="form-control" ><br>
                    <input type="submit" value="{{__('Save')}}" class="btn btn-success"><br>
                </form>

            </div>
    </div>
    </div>
    @else
        <div class="container col-md-5" dir="rtl">
            <div class="card">

                <div class="card-header">
                    <div class="switch" style="float: left;">
                        @include('partials.language_switcher')
                    </div>
                    <h2>{{__('Create Student')}}</h2>
                </div>
                <div class="card-body">
                    <form action="{{url('Student/Add')}}" method="post">
                        {{csrf_field()}}
                        <label >{{__('Name')}}</label><br>
                        <input type="text" name="name" id="name" class="form-control" required><br>
                        <label>{{__('phone')}}</label><br>
                        <input type="text" name="phone" id="phone" class="form-control" required><br>
                        <label>{{__('Class')}}</label><br>
                        <input type="text" name="class" id="class" class="form-control" required><br>
                        <label>{{__('Marks')}}</label><br>
                        <input type="text" name="marks" id="marks" class="form-control" required><br>
                        <label>{{__('Birth-date')}}</label><br>
                        <input type="date" name="birth_date" id="birth_date" class="form-control" required><br>
                        <input type="submit" value="{{__('Save')}}" class="btn btn-success" style="float: left"><br>
                    </form>

                </div>
            </div>
        </div>
    @endif
@endsection
