@extends('app.layout',['title' => 'Interactions | Quiz'])

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
        <div class="column is-half"><h4 class="is-size-4">Participations au quiz</h4></div>
        <div class="column is-half">
          <a class="button is-link is-pulled-right" href="{{ url('/download/quiz.xlsx') }}" target="_blank">
            <span class="icon"><i class="fas fa-download"></i></span>
            <span>Télecharger .xls</span>
          </a>
        </div>
      </div>


    <div class="columns is-multiline">
      <div class="column is-half">
        <div class="box">
          <h3 class="is-size-5">Quiz Général ( {{ collect($reponses['bonnes'])->sum('data') + collect($reponses['mauvaises'])->sum('data') }} votes ):</h3>
            <canvas id="all-results" width="400" height="400"></canvas>

        </div>
      </div>
      <div class="column is-half">
        <div class="box">
          <h3 class="is-size-5">Quiz spécialités ( {{ collect($specialite)->sum('data') }} votes ):</h3>
          <ul>
            @foreach($specialite as $s)
              <li><strong>{{ $s->labels }}</strong> : {{ $s->data }} votes</li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" integrity="sha256-Uv9BNBucvCPipKQ2NS9wYpJmi8DTOEfTA/nH2aoJALw=" crossorigin="anonymous"></script>
  <script>
    var ctx = document.getElementById('all-results').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'horizontalBar',
      data: {
        labels: {!! collect($reponses['bonnes'])->pluck('label') !!},
        datasets: [{
          label: 'Bonnes réponses',
          data: {{ collect($reponses['bonnes'])->pluck('data') }},
          backgroundColor: [
            'rgb(131,218,35)',
            'rgb(131,218,35)',
            'rgb(131,218,35)',
            'rgb(131,218,35)',
            'rgb(131,218,35)',
            'rgb(131,218,35)',
            'rgb(131,218,35)',
            'rgb(131,218,35)',
            'rgb(131,218,35)',
            'rgb(131,218,35)',
            'rgb(131,218,35)',
            'rgb(131,218,35)',
            'rgb(131,218,35)',
          ],
          borderColor: [
            'rgb(131,218,35)',
            'rgb(131,218,35)',
            'rgb(131,218,35)',
            'rgb(131,218,35)',
            'rgb(131,218,35)',
            'rgb(131,218,35)',
            'rgb(131,218,35)',
            'rgb(131,218,35)',
            'rgb(131,218,35)',
            'rgb(131,218,35)',
            'rgb(131,218,35)',
            'rgb(131,218,35)',
            'rgb(131,218,35)',
          ],
          borderWidth: 1
        },{
          label: 'Mauvaises réponses',
          data: {{ collect($reponses['mauvaises'])->pluck('data') }},
          backgroundColor: [
            'rgb(218,0,17)',
            'rgb(218,0,17)',
            'rgb(218,0,17)',
            'rgb(218,0,17)',
            'rgb(218,0,17)',
            'rgb(218,0,17)',
            'rgb(218,0,17)',
            'rgb(218,0,17)',
            'rgb(218,0,17)',
            'rgb(218,0,17)',
            'rgb(218,0,17)',
            'rgb(218,0,17)',
            'rgb(218,0,17)',
            'rgb(218,0,17)',
            'rgb(218,0,17)',
            'rgb(218,0,17)',
            'rgb(218,0,17)',
          ],
          borderColor: [
            'rgb(218,0,17)',
            'rgb(218,0,17)',
            'rgb(218,0,17)',
            'rgb(218,0,17)',
            'rgb(218,0,17)',
            'rgb(218,0,17)',
            'rgb(218,0,17)',
            'rgb(218,0,17)',
            'rgb(218,0,17)',
            'rgb(218,0,17)',
            'rgb(218,0,17)',
            'rgb(218,0,17)',
            'rgb(218,0,17)',
            'rgb(218,0,17)',
            'rgb(218,0,17)',
            'rgb(218,0,17)',
            'rgb(218,0,17)',
          ],
          borderWidth: 1
        }],
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }],
          xAxes: [{
            ticks: {
              beginAtZero: true,
              stepSize: 1
            }
          }]
        }
      }
    });
  </script>
@endsection
