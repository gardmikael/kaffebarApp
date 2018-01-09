@extends('layouts.main')

@section('title', 'Registrer varer')

@section('content')

<div class="row">
  <div class="col-md-12">
    <form action="{{route('items.store')}}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}

      <div class="row">
        <div class="col-md-12">
          <div class="page-header">
            <h1>Registrer en vare</h1>
          </div>
        </div>
      </div>
      <div class="row">

        <div class="col-md-4">
          <div class="form-group">
            <label for="item_name">Varenavn</label>
            <input autocomplete="off" name="item_name" class="form-control" type="text">
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label for="item_group">Varegruppe</label>
            <select name="item_group" class="form-control input-large">
              <option selected="true" disabled="disabled">Velg en varegruppe</option>
                <option value="drikke">Drikke</option>
                <option value="tillegg">Tillegg</option>
            </select>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
              <label for="attachment">Bilde</label>
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
      </div><!--end first row -->


      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="title">Salgsvare</label>
              <div class="checkbox">
                <label><input type="checkbox" id="sales-item-bool" name="is-sales-item"> Varen skal selges</label>
              </div>
              <div id="sales-item-atr">
                <div class="form-group">
                  <label for="state">Pris</label>
                  <input type="number" name="price" step="0.01" min="0.01" max="9999" class="form-control">
                </div>
              </div>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-5">
          <button class="btn btn-success">Legg til</button>
        </div>
      </div>
    </form>
  </div><!-- end .col-md-12 -->
</div><!-- end .row -->

@endsection

@section('scripts')
<script type="text/javascript" src="{{ URL::asset('js/stock.js') }}"></script>
@endsection
