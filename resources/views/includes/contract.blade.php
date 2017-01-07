<tr>
	<td>{{ $value->item }}</td>
	<td>{{ $value->quantity }}</td>
	<td>{{ $value->status }}</td>
	<td>
		<div class="progress">
				@if ($value->status == 'Sent')
					<div class="progress-bar progress-bar-default progress-bar-striped active" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="width: 15%">
						<span class="sr-only">Sent</span>
					</div>
				
				@elseif ($value->status == 'Waiting')
					<div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" style="width: 35%">
						<span class="sr-only">Waiting</span>
					</div>
				
				@elseif ($value->status == 'On Going')
					<div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
						<span class="sr-only">On Going</span>
					</div>
				
				@elseif ($value->status == 'Ready')
					<div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
						<span class="sr-only">Ready</span>
					</div>
				
				@endif
			</div>
	</td>
	<td>{{ $value->created_at }}</td>
</tr>