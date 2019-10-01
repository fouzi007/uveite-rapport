@extends('app.layout',['title' => 'Interactions | Questions posées'])

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
        <div class="column is-half"><h4 class="is-size-4">Liste complète des questions posées</h4></div>
        <div class="column is-half">
          <a class="button is-link is-pulled-right" href="{{ url('/download/questions.xlsx') }}" target="_blank">
            <span class="icon"><i class="fas fa-download"></i></span>
            <span>Télecharger .xls</span>
          </a>
        </div>
      </div>


    <div class="columns is-multiline">
      @foreach($questions as $q)
        <div class="column is-half">
          <article class="box">
            <div class="media">
              <div class="media-content">
              <div class="content">
                <p>
                  <strong>{{ $q->medecin->name }}</strong> <small>@ {{ $q->medecin->email }}</small> <small>{{ \Carbon\Carbon::parse($q->created_at)->format('H:i') }}</small>
                  <br>
                  {{ $q->question }}
                </p>
              </div>
            </div>
            </div>
          </article>
        </div>
      @endforeach
    </div>
  </div>
@endsection

@section('scripts')

@endsection
