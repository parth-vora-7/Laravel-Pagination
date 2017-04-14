@foreach($users as $user)
<p>{{ $loop->iteration }} - {{ $user->name }}</p>
@endforeach
<center>{{ $users->links() }}</center>
