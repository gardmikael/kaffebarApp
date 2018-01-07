@extends('layouts.main')

@section('title', 'Rediger vare')

@section('content')

<div class="row">
  <div class="col-md-12">
    <form action="{{route('items.update', $item)}}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      {{ method_field('put') }}

      <div class="row">
        <div class="col-md-12">
          <div class="page-header">
            <h1>Rediger vare</h1>
          </div>
        </div>
      </div>
      <div class="row">

        <div class="col-md-3">
          <div class="form-group">
            <label for="item_name">Varenavn</label>
            <input autocomplete="off" name="item_name" class="form-control" type="text" value="{{$item->name}}">
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            <label for="item_group">Varegruppe</label>
            <select name="item_group" class="form-control input-large">
              <option selected="true" disabled="disabled">Velg en varegruppe</option>
                <option value="drikke" @if($item->item_group == 'drikke' ) selected @endif>Drikke</option>
                <option value="tillegg" @if($item->item_group == 'tillegg' ) selected @endif>Tillegg</option>
                <option value="annet" @if($item->item_group == 'annet' ) selected @endif>Annet</option>
            </select>
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
              <label for="image">Bilde</label>
              <div class="input-group">
                <label class="input-group-btn">
                  <span class="btn btn-primary">
                    Browse&hellip; <input type="file" style="display: none;"  name="image">
                  </span>
                </label>
                <input type="text" class="form-control" readonly>
              </div>
              <span class="help-block">
                Bildet vil vises i POS
              </span>
          </div>
        </div>

        <div class="col-md-3 img-container">
          <img src="{{asset("storage/$item->img_path")}}" alt="">
        </div>

      </div><!--end first row -->


      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="title">Salgsvare</label>
              <div class="checkbox">
                <label><input type="checkbox" id="sales-item-bool" name="is-sales-item" @if(count($item->sales_item)) checked @endif> Varen skal selges</label>
              </div>
              <div id="sales-item-atr">
                <div class="form-group">
                  <label for="state">Pris</label>
                  <input type="number" name="price" step="0.01" min="0.01" max="9999" class="form-control" @if(count($item->sales_item)) value="{{$item->sales_item->price}}" @endif>
                </div>
              </div>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-5">
          <button class="btn btn-success">Oppdater</button>
        </div>
      </div>
    </form>
  </div><!-- end .col-md-12 -->
</div><!-- end .row -->

@endsection

@section('scripts')
<script type="text/javascript">

checkbox = $('#sales-item-bool'),
optionalBlock = $('#sales-item-atr');

optionalBlock.hide();

checkbox.on('click', function() {
  if($(this).is(':checked')) {
    optionalBlock.show();
    optionalBlock.find('input').attr('required', true);
  } else {
    optionalBlock.hide();
    optionalBlock.find('input').attr('required', false);
  }
})


$(document).ready( function() {

  if(checkbox.is(':checked')){
    optionalBlock.show();
  }

  $(document).on('change', ':file', function() {
    var input = $(this),
    numFiles = input.get(0).files ? input.get(0).files.length : 1,
    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });
  $(':file').on('fileselect', function(event, numFiles, label) {
      var input = $(this).parents('.input-group').find(':text'),
          log = numFiles > 1 ? numFiles + ' filer valgt' : label;
      if( input.length ) {
          input.val(log);
      } else {
          if( log ) alert(log);
      }
  });
});

</script>
@endsection
