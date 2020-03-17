title: {{$post->title}} <br/>
content: {{$post->content}} <br/>
author: {{$post->user->name}} <br/>
category: {{$post->category->title}} <br/>

@foreach ($post->tags as $tag)
    tag: {{$tag->title}} <br/>
@endforeach

@foreach ($post->comments as $comment)
    author: {{$comment->author}} <br/>
    comment: {{$comment->content}} <br/>        
@endforeach

<form action="{{route('post.destroy', ['post'=>$post])}}" method="post">
    @csrf
    @method('delete')
    <input type="submit" value="remover">
</form>