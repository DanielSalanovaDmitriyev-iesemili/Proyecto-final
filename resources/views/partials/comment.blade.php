@foreach ($comments as $comment)
    <div>
        <h1>Game: {{$comment->game()->get('name')[0]->name}}</h1>
        <h2>User: {{$comment->user_name}}</h2>
        <p>{{$comment->message}}</p>
        <p>Created At: {{$comment->created_at}}</p>
        <form action="{{route('comment.delete',$comment->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Eliminar</button>
        </form>
    </div>
@endforeach
{{$comments->links()}}
