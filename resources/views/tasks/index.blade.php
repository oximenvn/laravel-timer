@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
		<div class="panel panel-default"  title="Beautifull, insn't it?">
			<div class="panel-body ">
				<div class="lead" id="clock"></div>
			</div>
		</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					New Task
				</div>

				<div class="panel-body">
					<!-- Display Validation Errors -->
					@include('common.errors')

					<!-- New Task Form -->
					<form action="/task" method="POST" class="form-horizontal">
						{{ csrf_field() }}

						<!-- Task Name -->
						<div class="form-group">
							<label for="task-name" class="col-sm-3 control-label">Time</label>

							<div class="col-sm-6">
								<input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
							</div>
						</div>

						<!-- Add Task Button -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-default">
									<i class="fa fa-btn fa-plus"></i>Add Time
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<!-- Current Tasks -->
			@if (count($tasks) > 0)
				<div class="panel panel-default">
					<div class="panel-heading">
						Current Tasks
					</div>

					<div class="panel-body">
						<table class="table table-striped task-table">
							<thead>
								<th>Task</th>
								<th>&nbsp;</th>
							</thead>
							<tbody>
								@foreach ($tasks as $task)
									<tr>
										<td class="table-text"><div>{{ $task->name }}</div></td>

										<!-- Task Delete Button -->
										<td>
											<form action="/task/{{ $task->id }}" method="POST">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}

												<button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
													<i class="fa fa-btn fa-trash"></i>Delete
												</button>
	
											</form>
										</td>
										<td><div data-countdown="{{ $task->name }}" countdown="{{ $task->name }}"></div> </td>
										<td><button type="button" class="btn btn-primary botclick" id="btn-reset" data-count="{{ $task->name }}" >
											<i class="glyphicon glyphicon-repeat"></i>
											Show
											</button>

										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<script type="text/javascript">
				$('[data-countdown]').each(function() {
				var $this = $(this), finalDate = $(this).data('countdown');
				$this.countdown(finalDate, function(event) {
					$this.html(event.strftime('%D days %H:%M:%S'));
				});
				});
				</script>
			@endif
		</div>
	</div>

<script type="text/javascript">
  // Turn on Bootstrap
  $('[data-toggle="tooltip"]').tooltip();

  // 15 days from now!
  function get15dayFromNow() {
	return new Date(new Date().valueOf() + 1 * 1 * 1 * 0 * 1000);
  }

  var $clock = $('#clock');

  $clock.countdown(get15dayFromNow(), function(event) {
	$(this).html(event.strftime('%D days %H:%M:%S'));
  }).on('finish.countdown', function(event) {
   $(this).html('This offer has expired!')
	 .parent().addClass('disabled');
  });

  $('.botclick').click(function(e) { 
	var $this = $(this);
	$clock.countdown($this.data('count'));
  });
  
  
  

  

</script>

@endsection

