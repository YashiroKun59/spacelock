@extends('layouts.default')
@section('title') Espace : <?php echo $space->nickname ?> @endsection
@section('description') Taper ici la description @endsection
@section('keywords') Taper ici les mots-clés @endsection
@section('canonical'){{ URL::current() }}@endsection
@section('content')
<?php
    $fmt = numfmt_create( 'fr_BE', NumberFormatter::CURRENCY );
?>
   <main id="main">
    <?php echo $space ?>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="formule1">
            <label class="form-check-label" for="formule1">
              1 Mois (<?php echo $fmt->formatCurrency($space->amount, 'EUR') ?>)
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="formule2">
            <label class="form-check-label" for="formule2">
              3 Mois (<?php echo $fmt->formatCurrency(floatval($space->amount) * 0.90, 'EUR'); ?>)
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="formule3" checked>
            <label class="form-check-label" for="formule3">
              12 Mois (<?php echo $fmt->formatCurrency(floatval($space->amount) * 0.80, 'EUR'); ?>)
            </label>
          </div>
   </main>
@stop
