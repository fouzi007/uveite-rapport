@extends('app.layout',['title' => 'Interactions'])

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

@endsection

@section('scripts')

@endsection
