<!DOCTYPE html>
<html lang="en">
<head>
  <title>PROITZEN GALLERY</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

  @include("sheets.CSSimagedash")


</head>

<body>
  <div class="container" style="margin-top:30px">
    <div class="row">
      <div class='col-md-12'>
        <div class="panel panel-success" style="font-size:20px; text-align: center; height:50px;">
          <div style="height:50px;" class="panel-heading"> GALLERY
            <!-- <button type="button" style="float: right; margin:1px;background-color:#7283a7; border: none;" class="btn btn-info float-right btn-sm" onclick="window.location='http://127.0.0.1:8000/admin/record_group'">ADD PROJECT</button> -->
          </div>
        </div><!-- /.panel-heading -->
      </div><!-- /.panel panel-primary -->
    </div>

    @if (count($errors) > 0)
    <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.<br><br>
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
    @endif


    <div class="row">
      <div class="col-md-12">
        <h2>Add Images</h2>
      </div>


      <form method="post" action="{{url('form')}}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group row">
          <label for="titleid" class="col-sm-3 col-form-label">Title</label>
          <div class="col-sm-9">
            <input name="title" type="text" class="form-control" id="title" placeholder="Image Title">
          </div>
        </div>
        <div class="form-group row">
          <label for="publisherid" class="col-sm-3 col-form-label">Description</label>
          <div class="col-sm-9">
            <input name="description" type="text" class="form-control" id="description"
            placeholder="Image Description">
          </div>
        </div>
        <div class="form-group row">
          <label for="gameimageid" class="col-sm-3 col-form-label">Images</label>
          <div>


            <div class="input-group control-group increment" >
              <input type="file" name="image[]" class="form-control">
              <div class="input-group-btn">
                <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
              </div>
            </div>
            <div class="clone hide">
              <div class="control-group input-group" style="margin-top:10px">
                <input type="file" name="image[]" class="form-control">
                <div class="input-group-btn">
                  <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="offset-sm-3 col-sm-9">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
        <!-- <button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button> -->

      </form>

      @foreach($data as $image)
      <div class="col-md-12">
        <div class="col-sm-6">
          <!-- <br> -->
          <div class="card">
            <div class="card-block">
              <h4 class="card-title mt-3">Title : {{ $image->title }}</h4>
              <small>Description : {{ $image->description }}</small>
              <div class="meta">
                <!-- <a></a> -->
              </div>
              <!-- <div class="card-text">
              Project Description.
            </div> -->
          </div>
          <div class="card-footer">
            <?php
            //$a = $image->image;
            $a = explode('"', $image->image);
          //  dd($a[1]);



            // $resultArr = [];
            // $strLength = strlen($a);
            // $delimiter = ',';
            // $j = 0;
            // $tmp = '';
            // for ($i = 0; $i < $strLength; $i++) {
            //   if($delimiter === $a[$i]) {
            //     $j++;
            //     $tmp = '';
            //     continue;
            //   }
            //   $tmp .= $a[$i];
            //   $resultArr[$j] = $tmp;
            // }
            //
            //
            // dd( $resultArr ); ?>
            <img src="images/{{ $image->image }}" />
          </div>
          <div class="card-footer">
            <button onclick="window.location =''"
            class="btn btn-primary float-left btn-sm" style="margin:1px;background-color:#45526e; border: none;">Edit</button>
          </div>
        </div>
        <br>
      </div>
    </div>


    @endforeach


  </div>
</div>



<script type="text/javascript">

$(document).ready(function() {

  $(".btn-success").click(function(){
    var html = $(".clone").html();
    $(".increment").after(html);
  });

  $("body").on("click",".btn-danger",function(){
    $(this).parents(".control-group").remove();
  });

});

</script>
</body>
</html>
