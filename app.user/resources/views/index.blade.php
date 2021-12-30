<form method="post" action="/first">
   @csrf
<input type="text" name="fname"><br> @if ($errors->has('fname'))

<span class="text-danger">{{ $errors->first('fname') }}</span>

@endif
<input type="submit" value="SAVE">
</form>