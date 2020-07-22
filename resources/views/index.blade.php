@extends('layouts.app')

@section('content')
<table>
    <tr>
      <td class="droppable">
        <div class="draggable">1</div>
      </td>
      <td class="droppable">
      </td>
      <td class="droppable">
        <div class="draggable">2</div>
      </td>
    </tr>
    <tr>
      <td class="droppable">
      </td>
      <td class="droppable">
        <div class="draggable">3</div>
      </td>
      <td class="droppable">
      </td>
    </tr>
    <tr>
      <td class="droppable">
        <div class="draggable">4</div>
      </td>
      <td class="droppable">
        <div class="draggable">5</div>
      </td>
      <td class="droppable">
        <div class="draggable">6</div>
      </td>
    </tr>
  </table>
@endsection

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script type="text/javascript">
$( document ).ready(function() {
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

    if ($(droppable).children('.draggable:visible:not(.ui-draggable-dragging)').length > 0) {
      $(droppable).children('.draggable:visible:not(.ui-draggable-dragging)').detach().prependTo(dragLastPlace);
    }

    $(draggable).detach().css({
      top: 0,
      left: 0
    }).prependTo($(droppable)).show();

    movedLastPlace = undefined;
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