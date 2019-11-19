<ul>
@foreach($childs as $child)
	<li>
	<a> {{ $child->name }} </a> <span class="m-2 badge badge-dark">{{$child->children()->count()}}</span><a href="{{ route('admin.sections.show', $child->id) }}"><i class="p-2 fa fa-eye" aria-hidden="true"></i></a>

	@if($child->hasChildren())
            @include('admin.sections.child',['childs' => $child->children])
        @endif
	</li>
@endforeach
</ul>