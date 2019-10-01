@extends('app.layout',['title' => 'Audience'])

@section('content')
<div class="container mt">
  <div class="columns">
    <div class="column is-half"><h4 class="is-size-4">Liste complète des inscrits</h4></div>
    <div class="column is-half">
      <a class="button is-link is-pulled-right" href="{{ url('/download/audience.xlsx') }}" target="_blank">
        <span class="icon"><i class="fas fa-download"></i></span>
        <span>Télecharger .xls</span>
      </a>
    </div>
  </div>

  <table class="table is-fullwidth is-striped">
    <thead>
      <tr>
        <th>Nom </th>
        <th>Adresse e-mail</th>
        <th>Heure d'inscription</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
        <tr>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ \Carbon\Carbon::parse($user->created_at)->format('H:i') }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <div class="mt">
    {{ $users->links() }}
  </div>
</div>
@endsection

@section('scripts')

@endsection
