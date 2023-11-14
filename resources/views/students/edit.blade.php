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
        <div class="container col-md-5" >
            <div class="card">
                <div class="card-header">
                    <div class="switch" style="float: right;">
                        @include('partials.language_switcher')
                    </div>
                    <h3>{{__('Edit student')}}</h3>
                </div>
                    <div class="card-body">
                        <form action="{{url('Student/Edit/'.$students->id)}}" method="post">
                            {{csrf_field()}}

                            <input type="hidden" name="id" id="id" value="{{$students->id}}"  class="form-control"/>
                            <label>{{__('Name')}}</label><br>
                            <input type="text" name="name" id="name" value="{{$students->name}}" class="form-control"/><br>
                            <label>{{__('Phone')}}</label><br>
                            <input type="text" name="phone" id="phone" value="{{$students->phone}}" class="form-control"/><br>
                            <label>{{__('Class')}}</label><br>
                            <input type="text" name="class" id="class" value="{{$students->class}}" class="form-control"/><br>
                            <label>{{__('Marks')}}</label><br>
                            <input type="text" name="marks" id="marks" value="{{$students->marks}}" class="form-control"/><br>
                            <label>{{__('Birth-date')}}</label><br>
                            <input type="date" name="birth_date" id="birth_date" value="{{$students->birth_date}}" class="form-control"><br>
                            <input style="float: right;" type="submit" value="{{__('Update')}}" class="btn btn-success"><br>
                        </form>
                    </div>
            </div>
        </div>
    @else
        <div class="container col-md-5" dir="rtl">
            <div class="card">
                <div class="card-header">
                    <div class="switch" style="float: left;" >
                        @include('partials.language_switcher')
                    </div>
                    <h3>{{__('Edit student')}}</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('Student/Edit/'.$students->id)}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="id" id="id" value="{{$students->id}}"  class="form-control"/>
                        <label>{{__('Name')}}</label><br>
                        <input type="text" name="name" id="name" value="{{$students->name}}" class="form-control"/> <br>
                        <label>{{__('Phone')}}</label><br>
                        <input type="text" name="phone" id="phone" value="{{$students->phone}}" class="form-control"/><br>
                        <label>{{__('Class')}}</label><br>
                        <input type="text" name="class" id="class" value="{{$students->class}}" class="form-control"/><br>
                        <label>{{__('Marks')}}</label><br>
                        <input type="text" name="marks" id="marks" value="{{$students->marks}}" class="form-control"/><br>
                        <label>{{__('Birth-date')}}</label><br>
                        <input type="date" name="birth_date" id="birth_date" value="{{$students->birth_date}}" class="form-control"><br>
                        <input style="float: left;" type="submit" value="{{__('Update')}}" class="btn btn-success"><br>
                    </form>
                </div>
            </div>
        </div>

    @endif
@endsection
