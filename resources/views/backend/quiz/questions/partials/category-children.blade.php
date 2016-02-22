@if ($category->children->count())
    <li id="cat-{!! $category->id !!}">{!! $category->name !!}
        <ul>
            @foreach ($category->children as $child)
                @include('backend.quiz.questions.partials.category-children', ['category' => $child])
            @endforeach
        </ul>
    </li>
@else
    <li id="cat-{!! $category->id !!}">{!! $category->name !!}</li>
@endif