<tr class="simpleCart_shelfItem">
	<td>
		<img class="item_thumb" src="{{ $value->icon }}" alt="Main Logo" style="width: 60px; height: 60px; border-radius: 3px; -webkit-box-shadow: 0px 3px 8px 0px rgba(0,0,0,0.2); margin-bottom: 20px;">
	</td>
	<td class="item_name">{{ $value->name }}</td>
	<td>{{ $value->category }}</td>
	<td class="item_price"><strong>{{ number_format($value->price, 2, ',', ' ') }} ISK</strong></td>
	<td><a class="item_add" href="javascript:;"><button type="button" class="btn btn-primary btn-sm">Add to Cart</button></a></td>
</tr>