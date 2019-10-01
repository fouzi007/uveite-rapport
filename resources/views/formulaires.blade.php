@extends('app.layout',['title' => 'Interactions | Formulaire de satisfaction'])

@section('navbar.foot')
  <div class="hero-foot">
    <nav class="tabs is-boxed is-fullwidth">
      <div class="container">
        <ul>
          <li class="{{ Request::path() === 'interaction/questions' ? 'is-active' : '' }}">
            <a href="{{  url('interaction/questions') }}">
              <span class="icon"><i class="fas fa-question"></i></span>
              <span>Questions</span>
            </a>
          </li>
          <li class="{{ Request::path() === 'interaction/quiz' ? 'is-active' : '' }}">
            <a href="{{  url('interaction/quiz') }}">
              <span class="icon"><i class="fas fa-trophy"></i></span>
              <span>Quiz</span>
            </a>
          </li>
          <li class="{{ Request::path() === 'interaction/formulaires' ? 'is-active' : '' }}">
            <a href="{{  url('interaction/formulaires') }}">
              <span class="icon"><i class="fas fa-list"></i></span>
              <span>Formulaire de satisfaction</span>
            </a>
          </li>
          <li class="{{ Request::path() === 'interaction/autre' ? 'is-active' : '' }}">
            <a href="{{  url('interaction/autre') }}">
              <span class="icon"><i class="fas fa-plus"></i></span>
              <span>Autre</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
@endsection


@section('content')
  <div class="container mt">

      <div class="columns">
        <div class="column is-half"><h4 class="is-size-4">Soumissions formulaires de satisfaction</h4></div>
        <div class="column is-half">
          <a class="button is-link is-pulled-right" href="{{ url('/download/formulaires.xlsx') }}" target="_blank">
            <span class="icon"><i class="fas fa-download"></i></span>
            <span>Télecharger .xls</span>
          </a>
        </div>
      </div>


    <div class="columns is-multiline">
      <div class="column is-half">
        <div class="box">
          <h3 class="is-size-5">Tendances par question <small>( 5 : très satisfait )</small></h3>
          <table class="table is-fullwidth">
            <thead>
            <tr>
              <th>Question</th>
              <th>Moyenne</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>La manifestation a-t-elle répondu à vos attentes ?</td>
              <td>{{ round($tendances->q1,2) }}</td>
            </tr>
            <tr>
              <td>Pertinence des informations communiquées avant l’événement (date, lieu, ...etc)</td>
              <td>{{ round($tendances->q2,2) }}</td>
            </tr>
            <tr>
              <td>Organisation logistique</td>
              <td>{{ round($tendances->q3,2) }}</td>
            </tr>
            <tr>
              <td>Le lieu de l’événement</td>
              <td>{{ round($tendances->q4,2) }}</td>
            </tr>
            <tr>
              <td>Panorama et classification des uvéites</td>
              <td>{{ round($tendances->q5,2) }}</td>
            </tr>
            <tr>
              <td>Prise en charge thérapeutique des uvéites : là où l'ophtalmologiste s'arrête</td>
              <td>{{ round($tendances->q6,2) }}</td>
            </tr>
            <tr>
              <td>Prise en charge thérapeutique des uvéites : là où internistes et rhumatologues commencent ...</td>
              <td>{{ round($tendances->q7,2) }}</td>
            </tr>
            <tr>
              <td>Cas cliniques commentés</td>
              <td>{{ round($tendances->q10,2) }}</td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="column is-half">
        <div class="box">
          <h3 class="is-size-5">Afficher un formulaire</h3>
          <div id="users" class="mt">
            <ul>
              @foreach($medecins as $m)
                <li><a href="{{ url('/formulaires',$m->id) }}">{{ $m->name }}</a></li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')

@endsection
