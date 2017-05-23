@extends('layouts.app')

@section('content')

<a href="{{ url('/download')  }}" >Download</a> |  <a href={{ asset($my_file) }}>View</a>



@endsection