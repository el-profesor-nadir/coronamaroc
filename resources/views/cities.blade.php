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
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title ">
            Répartition des cas par ville (Dernière mise à jour : ) <br>
            توزيع الحالات المؤكدة حسب المدن (اخر تحديث : )
          </h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table" data-order='[[ 2, "desc" ]]'>
              <thead class=" text-primary">
                <th>
                  Code ville /رمز المدينة
                </th>
                <th>
                  Nom ville / إسم المدينة
                </th>
                <th>
                  Cas confirmé​s / الحالات المؤكدة
                </th>
              </thead>
              <tbody>
                @foreach ($cities['features'] as $city)
                  <tr>
                    <td>
                      {{$city['attributes']['VILLES_ID']}}
                    </td>
                    <td>
                      {{$city['attributes']['NOM']}}
                    </td>
                    <td class="text-primary">
                      {{$city['attributes']['cas_confir'] == null ? '0' : $city['attributes']['cas_confir'] }}
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection