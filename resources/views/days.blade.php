@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card card-plain">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Corona Maroc / كورونا بالمغرب</h4>
          <p class="card-category">
            Actualité sur le nouveau coronavirus (Covid-19) au maroc <br>
            اخر مستجدات مرض كورونا المستجد بالمغرب
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card card-chart">
        <div class="card-header card-header-primary">
          <h4 class="card-title">nombre des cas confirmés par jour / عدد الحالات المؤكدة كل يوم</h4>
        </div>
        <div class="card-body">
          {!! $confirmedCasesByDayChart->container() !!}
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="card card-chart">
        <div class="card-header card-header-primary">
          <h4 class="card-title">nombre des cas rétablis par jour / عدد المتعافين كل يوم</h4>
        </div>
        <div class="card-body">
          {!! $recoveredCasesByDayChart->container() !!}
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="card card-chart">
        <div class="card-header card-header-primary">
          <h4 class="card-title">nombre des cas décédés par jour / عدد الوفيات كل يوم</h4>
        </div>
        <div class="card-body">
          {!! $deathCasesByDayChart->container() !!}
        </div>
      </div>
    </div>

  </div>
</div>
@endsection

@section('scripts')
      <!-- Library for Charts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
  {!! $confirmedCasesByDayChart->script() !!}
  {!! $recoveredCasesByDayChart->script() !!}
  {!! $deathCasesByDayChart->script() !!}
@endsection