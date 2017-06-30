<div class="col-4">
    @foreach ($posts as $post)
        <div class="post">
            <h2>
                <a class="post-link" href="/post/{{ $post->id }}">{{ $post->title }}</a>
            </h2>
            <h6 class="timestamp">
                {{ $post->created_at }}
            </h6>
            <span class="post-description">
                {{ $post->description }}
            </span>
        </div>
    @endforeach
</div>
