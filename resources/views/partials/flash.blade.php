@if(session('status'))
	<div class="alert alert-success">
		{{session('status')}}
	</div>
@endif
@if(session('delprodu'))
	<div class="alert alert-danger">
		{{session('delprodu')}}
	</div>
@endif