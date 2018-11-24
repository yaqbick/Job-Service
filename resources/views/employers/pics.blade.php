@extends('layouts.app')

@section('content')

<div class="container pt-5">
  <?php $id=0; for($i=0; $i<$rowsCount;$i++) 
  {
    echo "<div class='row pt-5'>";
    for($j=0;$j<4;$j++)
    {
 echo '<div class="col"><a href = "/employers/choose/imageId='.$images[$id]->id.'"><img src="'.$images[$id]->url.'" class="img-fluid rounded" width="100" height="100" ></div>';
      $id++;
    }

    echo "</div>";
  }
  
?>
</div>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               {{csrf_field()}}

@endsection                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               