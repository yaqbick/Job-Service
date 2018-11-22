@extends('layouts.app')

@section('content')

<div class="container pt-5">
  <?php $id=0; for($i=0; $i<$rowsCount;$i++) 
  {
    //echo "<div class='row pt-5'>";
    for($j=0;$j<2;$j++)
    {
     // echo '<div class="col"><a href = "/employers/create/imageId='.$images[$id]->id.'"><img src="'.$images[$id]->url.'" class="img-fluid rounded" width="100" height="100" ></div>';
     // $id++;
    }

    //echo "</div>";
  }
  
?>
</div>
<div>
<form method="post" action="{{action('EmployerController@chooseImg')}}" enctype="multipart/form-data">
{{csrf_field()}}
<input  class="form-control" name='image' id='3' value='3'>
<button type="submit">button</button>
</form>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 {{csrf_field()}}

@endsection                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               