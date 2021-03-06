hi

@extends('layouts.appmini')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <birthdays></birthdays>
        </div>
    </div>
@endsection
@section('vue-script')
    <script src="{{ asset('public/vue/birthdays.js') }}"></script>
@endsection
