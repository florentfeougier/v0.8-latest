@extends('layouts.front.app')

@section('template_title', "$astuce->name - Astuce")


@section('og')
<meta name="og:title" property="og:title" content="{{$astuce->name}} - Blog">
@endsection

@section('content')


	{!!$astuce->content!!}


	<script type="text/javascript">
	$(function () {
	$('[data-toggle="tooltip"]').tooltip()
	})
	</script>
@endsection

@section('footer_scripts')

<script type="text/javascript">
$(function () {
$('[data-toggle="tooltip"]').tooltip()
})
</script>

@endsection
