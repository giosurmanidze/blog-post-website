@foreach ($posts as $post )
   <h1>{{$post['title']}}</h1>
    <p>{{$post['content']}}</p>
    <td>{{ $post->comments_count }}</td>
@endforeach