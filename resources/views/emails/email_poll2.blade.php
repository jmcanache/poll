<div style="text-decoration: underline;"><h3>Poll Answers</h3></div>
<table style="border: 1px solid black;border-collapse: collapse; padding: 5px;">
	<thead style="border: 1px solid black;border-collapse: collapse;">
		<th style="border: 1px solid black;border-collapse: collapse; padding: 5px;">Indicator</th>
		<th style="border: 1px solid black;border-collapse: collapse; padding: 5px;">Answer</th>
		<th style="border: 1px solid black;border-collapse: collapse; padding: 5px;">Explanation</th>
	</thead>
	<tbody style="border: 1px solid black;border-collapse: collapse;">
		@foreach($answers as $indi => $answer)
			<tr>
				<td style="border: 1px solid black;border-collapse: collapse;padding: 5px;">{{ $db_indicators[$indi] }}</td>
				<td style="border: 1px solid black;border-collapse: collapse; text-align: center;padding: 5px;">
					@if($answer == 1) Yes
					@elseif($answer == 2) Not sure
					@else No
					@endif
				</td>
				<td style="border: 1px solid black;border-collapse: collapse;padding: 5px;">{{ $explains->$indi . PHP_EOL }}</td>
			</tr>
		@endforeach
	</tbody>
</table>
<br>
<div style="text-decoration: underline;"> <h3>Poll Suggetes Indicators</h3></div>
<table style="border: 1px solid black;border-collapse: collapse;padding: 5px;">
	<thead style="border: 1px solid black;border-collapse: collapse;padding: 5px;">
		<th style="border: 1px solid black;border-collapse: collapse; padding: 5px;">Indicator</th>
		<th style="border: 1px solid black;border-collapse: collapse; padding: 5px;"">Why?</th>
	</thead>
	<tbody style="border: 1px solid black;border-collapse: collapse;padding: 5px;">
		@foreach($indicators as $indi => $why)
			<tr>
				<td style="border: 1px solid black;border-collapse: collapse;padding: 5px;">{{ $indi }}</td>
				<td style="border: 1px solid black;border-collapse: collapse;padding: 5px;">{{ $why }}</td>
			</tr>
		@endforeach
	</tbody>
</table>