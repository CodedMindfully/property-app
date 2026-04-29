<x-layouts.app>
	<h1>Properties for Sale</h1>
	 @if (session('error'))
        <div style="background: #fee2e2; color: #b91c1c; padding: 1rem; margin-bottom: 1rem;">
            {{ session('error') }}
        </div>
    @endif
	{{--This is a blade commend --}}
	@if($properties->isEmpty())
		<p>No properties found.</p>
	@else
		@foreach($properties as $property)
			<div style="border:1px solid #ccc; padding:15px; margin-bottom: 25px;">
				<a href="/property/{{$property->id}}">
					<h2>{{$property->title}}</h2>
					{{-- The getFormattedPriceAttribute() becomes formatted_price--}}
					<p><strong>Price</strong>{{$property->formatted_price}}</p>
					<p><strong>Location</strong>{{$property->location}}</p>
					<p><strong>status</strong>{{$property->status}}</p>
				</a>
			</div>
		@endforeach
	@endif
</x-layouts.app>
	
