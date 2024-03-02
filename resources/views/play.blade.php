<div>
    <h1>Playground</h1>

    <ul>
        <li><a href="{{ route('play.create-post') }}">Create Post</a></li>
        <li><a href="{{ route('play.clear-post') }}">Clear Post</a></li>
    </ul>

    <table border="1" cellpadding="4" cellspacing="0">
    <tr>
        <td>ID</td>
        <td>Title</td>
        <td>Body</td>
        <td>Author</td>
        <td>Comment</td>
        <td>Action</td>
    </tr>

    @forelse($posts as $post)
    <tr>
        <td>{{ $post->id }}</td>
        <td>{{ $post->title }}</td>
        <td>{{ $post->body }}</td>
        <td>{{ $post->user->name }}</td>
        <td>
            <ul>
            <a href="{{ route('play.create-comment', ['id' => $post->id]) }}">Add Comment</a>
            @foreach ( $post->comments as $comment )
            <li>{{ $comment->text }}</li>
            @endforeach
            </ul>
        </td>
        <td>
            <a href="{{ route('play.delete-post', ['id' => $post->id]) }}">Delete</a>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="6">No data found.</td>
    </tr>
    @endforelse

    </table>

    <div>
        @dump(DB::getQueryLog())
    </div>
</div>
