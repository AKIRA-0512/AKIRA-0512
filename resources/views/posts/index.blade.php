<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
     <x-app-layout>
        <x-slot name="header">
        　ブログ
        </x-slot>
    <body>
        <h1>Blog Name</h1>
        <a href='/posts/create'>create</a>
        <div class='posts'>
            @foreach ($posts as $post)
            <a href="/categories/{{ $post->category2s->id }}">{{ $post->category2s->name }}</a>
                <div class='post'>
                    <h2 class='title'><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
                    <p class='body'>{{ $post->body }}</p>
                    <form action="/posts/{{ $post->id}}" id="form_{{ $post->id }}"method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id}})">delete</button>
                    </form>
                </div>
            @endforeach
        </div>
        <div class='paginate'>{{ $posts->links() }}</div>
         {{ Auth::user()->name }}
         
        <div>
            @foreach($questions as $question)
                <div>{{ $question['title'] }}</div>
                <div>
                    <a href="https://teratail.com/questions/{{ $question['id'] }}">
                        {{ $question['title'] }}
                    </a>
                </div>
            @endforeach
        </div>
    </body>
    </x-app-layout>

    <script>
        function deletePost(id) {
            'use strict'
            
            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>
</html>