<div class="form-group">
            
    {!! Form::label('presentation_id', 'Presentación') !!}
    <select name="presentation_id" id="presentation_id" class="form-control" style="width:100%;">
        <option value="0">Seleccione</option>
        @foreach ($presentations as $p)
        @if ($product->presentation_id == $p->id)
        <option selected value="{{$p->id}}">{{$p->name}} {{$p->medida}}</option> 
        @else
        <option value="{{$p->id}}">{{$p->name}} {{$p->medida}}</option>
        @endif
        @endforeach   
    </select>

    @error('presentation_id')
        <small class="text-danger">{{$message}}</small>   
    @enderror

</div>