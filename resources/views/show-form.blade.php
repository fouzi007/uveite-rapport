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
                    </span> </li>
                    <li class="{{ Request::path() === 'interaction/quiz' ? 'is-active' : '' }}">
                        <a href="{{  url('interaction/quiz') }}">
                            <span class="icon"><i class="fas fa-trophy"></i></span>
                            <span>Quiz</span>
                        </a>
                    </span> </li>
                    <li class="{{ Request::path() === 'interaction/formulaires' ? 'is-active' : '' }}">
                        <a href="{{  url('interaction/formulaires') }}">
                            <span class="icon"><i class="fas fa-list"></i></span>
                            <span>Formulaire de satisfaction</span>
                        </a>
                    </span> </li>
                    <li class="{{ Request::path() === 'interaction/autre' ? 'is-active' : '' }}">
                        <a href="{{  url('interaction/autre') }}">
                            <span class="icon"><i class="fas fa-plus"></i></span>
                            <span>Autre</span>
                        </a>
                    </span> </li>
                </ul>
            </div>
        </nav>
    </div>
@endsection


@section('content')
    <div class="container mt">
        <div class="colmuns">
            <div class="column">
                <div class="box">
                    <h3 class="is-size-5">Soumission de  {{ \App\Medecin::find($form->user_id)->name }}</h3>
                    <h3 class="is-size-6"><i class="fas fa-clock"></i>  {{ \Carbon\Carbon::parse($form->created_at)->format('H:i') }}</h3>
                    <strong>APPRECIATION GLOBALE DE L’ÉVÉNEMENT</strong>
                    <ul>
                        <li> La manifestation a-t-elle répondu à vos attentes ? <span class="tag is-info"> {{ $form->q1 }}</span> </li>
                        <li> Pertinence des informations communiquées avant l’événement (date, lieu, ...etc) <span class="tag is-info"> {{ $form->q2 }}</span> </li>
                        <li> Organisation logistique <span class="tag is-info"> {{ $form->q3 }}</span> </li>
                        <li> Le lieu de l’événement <span class="tag is-info"> {{ $form->q4 }}</span> </li>
                    </ul>
                    <strong>CONTENU SCIENTIFIQUE</strong>
                    <ul>
                        <li> Panorama et classification des uvéites <span class="tag is-info"> {{ $form->q5 }}</span> </li>
                        <li> Prise en charge thérapeutique des uvéites : là où l'ophtalmologiste s'arrête <span class="tag is-info"> {{ $form->q6 }}</span> </li>
                        <li> Prise en charge thérapeutique des uvéites : là où internistes et rhumatologues commencent ... <span class="tag is-info"> {{ $form->q7 }}</span> </li>
                        <li> Cas cliniques commentés <span class="tag is-info"> {{ $form->q10 }}</span> </li>
                        <li> Est ce que les données de cet événement vont vous permettre de modifier vos pratiques quotidiennes ? <span class="tag is-info"> {{ $form->q8 === 1 ? 'Oui' : 'Non' }}</span> </li>
                        <li> Recommanderiez vous cet évènement à d’autres collègues ? <span class="tag is-info"> {{ $form->q9 === 1 ? 'Oui' : 'Non' }}</span> </li>

                    </ul>
                    <strong>Points à améliorer</strong>
                    <div class="box">
                        {{ $form->points }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
