@extends('layouts.app')
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js">

</head>
@section('content')
<div class="card shadow">
  <div class="card-header bg-diamond text-white">
     <h3>Text Styling</h3>
  </div>
  <div class="card-body">
    <div class="row mb-3">
      <div class="col text-center">
        <h4>Items</h4>
      </div>
      <div class="col text-center">
        <h4>Styling</h4>
      </div>
      <div class="col text-center">
        <h4>Color</h4>
      </div>
    </div>
    @foreach ($items as $item)
    <div class="row">
      <div class="col">
        <p>{{ $item->name }}</p>
      </div>
      <div class="col">
        <div class="form-group">
          <select id="styling" class="form-control styling-change" item-id="{{ $item->id }}">
            @foreach ($styles as $style)
              <option value="{{ $style->name }}" {{ $style->name == $item->styling ? 'selected=selected' : ''}}>{{ $style->name }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <select class="form-control color-change" item-id="{{ $item->id }}">
            @foreach ($colors as $color)
              <option value={{ $color->name }} {{ $color->name == $item->color ? 'selected' : ''}}>{{ $color->name }}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

<div class="card mt-5 mb-5 shadow">
  <div class="card-body d-flex justify-content-center">
    <table>
        @for ($r = 1; $r <= $rows; $r++)
        <tr key="{{ $r }}">
          @for ($c = 1; $c <= $columns; $c++)
            @foreach ($items as $item)
              @if($item->row == $r && $item->column == $c)
                <td class="droppable"  key="{{ $c }}">
                  <div class="draggable">{{$item->name}}</div>
                </td>
              @else
                <td class="droppable"></td>
            @endif
            @endforeach
          @endfor
        </tr>
        @endfor 
    </table>
  </div>
</div>

{{-- @for ($r = 1; $r <= $rows; $r++)
        <tr key="{{ $r }}">
          @for ($c = 1; $c <= $columns; $c++)
            @foreach ($items as $item)
              @if($item->row == $r && $item->column == $c)
                <td class="droppable"  key="{{ $c }}">
                  <div class="draggable">{{$item->name}}</div>
                </td>
              @else
                <td class="droppable"></td>
            @endif
            @endforeach
          @endfor
        </tr>
      @endfor --}}

@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
  $( document ).ready(function() {
    // alert( "ready!" );

    var prev_val;

    $(".styling-change").on('focus', function(event){
      prev_val = this.value;
    })
    .change(function() {

      var styling = $(this).children("option:selected").val();
      var id = $(this).attr("item-id");

      $.ajax({
        method:'POST',
        url: 'updatestyle/'+ id,
        data: {
          "_token": "{{ csrf_token() }}",
          id:id,
          styling:styling
          },
        success: function(response){ 
          Swal.fire({
            title: 'Done!',
            text: "Text styling has been updated",
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK!',
            allowOutsideClick: false,
            reverseButtons: true
          })
        },
        error: function(response){
          Swal.fire({
            allowOutsideClick: false,
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!'
          })
        }
      });


        
    });

    $(".color-change").on('focus', function(event){
    })
    .change(function() {
      var color = $(this).children("option:selected").val();
      var id = $(this).attr("item-id");

      $.ajax({
        method:'POST',
        url: 'updatecolor/'+ id,
        data: {
          "_token": "{{ csrf_token() }}",
          id:id,
          color:color
          },
        success: function(response){ 
          Swal.fire({
            title: 'Done!',
            text: "Text color has been updated",
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK!',
            allowOutsideClick: false,
            reverseButtons: true
          })
        },
        error: function(response){
          Swal.fire({
            allowOutsideClick: false,
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!'
          })
        }
      });
    });

    var dragLastPlace;
  var movedLastPlace;


  $('.draggable').draggable({
    placeholder: 'placeholder',
    zIndex: 1000,
    containment: 'table',
    helper: function(evt) {
      var that = $(this).clone().get(0);
      $(this).hide();
      return that;
    },
    start: function(evt, ui) {
      dragLastPlace = $(this).parent();
    },
    cursorAt: {
      top: 20,
      left: 20
    }
  });

  $('.droppable').droppable({
    hoverClass: 'placeholder',
    drop: function(evt, ui) {
      var draggable = ui.draggable;
      var droppable = this;

      var color = $(this).children("option:selected").val();
      var id = $(this).attr("box-id");

      if ($(droppable).children('.draggable:visible:not(.ui-draggable-dragging)').length > 0) {
        $(droppable).children('.draggable:visible:not(.ui-draggable-dragging)').detach().prependTo(dragLastPlace);
      }

      $(draggable).detach().css({
        top: 0,
        left: 0
      }).prependTo($(droppable)).show();

      movedLastPlace = undefined;

      console.log(id);

      // $.ajax({
      //   method:'POST',
      //   url: 'updatecolor/'+ id,
      //   data: {
      //     "_token": "{{ csrf_token() }}",
      //     id:id,
      //     color:color
      //     }
      // });
    },
    over: function(evt, ui) {
      var draggable = ui.draggable;
      var droppable = this;

      if (movedLastPlace) {
        $(dragLastPlace).children().not(draggable).detach().prependTo(movedLastPlace);
      }

      if ($(droppable).children('.draggable:visible:not(.ui-draggable-dragging)').length > 0) {
        $(droppable).children('.draggable:visible').detach().prependTo(dragLastPlace);
        movedLastPlace = $(droppable);
      }
    }
  })
  });

</script>