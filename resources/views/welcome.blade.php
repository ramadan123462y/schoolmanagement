<form action="{{ url('image/store') }}" method="POST" enctype="multipart/form-data" >
@csrf
<input type="file" name="photos[]"  multiple>
<button type="submit">save</button>
</form>
