@if ($category->children->count())
    <li class="dd-item" data-id="{!! $category->id !!}">
        <div class="dd-handle">{!! $category->name !!}</div>
        <ol class="dd-list">
            @foreach($category->children as $child)
                @include('backend.quiz.categories.partials.category-children', ['category' => $child])
            @endforeach
        </ol>
    </li>
@else
    <li class="dd-item" data-id="{!! $category->id !!}">
        <div class="dd-handle">{!! $category->name !!}</div>
    </li>
@endif