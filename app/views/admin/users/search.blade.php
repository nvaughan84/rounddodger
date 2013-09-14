@extends('admin.master')
@section('content')

<h2>User search</h2>

Search results for <strong><?php echo $term?></strong>:
<p>
@foreach($users as $user)
	<div class='row-fluid'>
		<div class='span4'>{{$user->first_name}} {{$user->last_name}}</div>
		<div class='span2'>{{link_to('admin/user/'.$user->id.'/edit', 'edit', array('class'=>'label'))}}</div>
	</div>@endforeach
</p>

@stop