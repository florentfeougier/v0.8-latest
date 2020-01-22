@extends('layouts.front')

@section('template_title')
  {{ $page->name }}
@endsection

@section('meta_description')
  {{ $page->description }}
@endsection

@section('content')

<section class="py-4">
  <div class="container">
    {!!$page->content!!}
  </div>
</section>

@endsection
