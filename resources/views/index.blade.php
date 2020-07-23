@extends('layouts.app')

@section('content')
<h2>Dashboard</h2>
<div class="card mt-3 mb-5 shadow">
  <div class="card-body d-flex justify-content-center">
    <table>
      @for ($r = 1; $r <= $rows; $r++)
      <tr key={{ $r }}>
        @for ($c = 1; $c <= $columns; $c++)    
          @if ( App\Http\Controllers\ItemsController::getItem($items, $r, $c) != null)
            <td class="droppable p-1"   >
              <div class="card bg-diamond draggable w-100" style="pointer-events: none;user-select: none;">
              <div class="{{  \App\Http\Controllers\ItemsController::getColor($items, $r, $c) != null ? 'text-'. \App\Http\Controllers\ItemsController::getColor($items, $r, $c) : '' }} {{  \App\Http\Controllers\ItemsController::getStyle($items, $r, $c) == 'italic' ? 'font-'. \App\Http\Controllers\ItemsController::getStyle($items, $r, $c) : 'font-weight-'.\App\Http\Controllers\ItemsController::getStyle($items, $r, $c) }}" 
              ><?php echo \App\Http\Controllers\ItemsController::getItem($items, $r, $c); ?></p>
                
              </div>
            </td>
          @else
            <td class="droppable"></td>
          @endif      
          
        @endfor
      </tr>
      @endfor
      </table>
    </div>
</div>
@endsection

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  
    

