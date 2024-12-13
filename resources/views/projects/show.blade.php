<x-project-layout>
    <h1>{{ $project->title }}</h1>
    <p>{{ $project->description }}</p>
    <a href="{{ $project->url }}" target="_blank">View Project</a>

    @if ($project->banner)
        <div>
            <h2>Banner</h2>
            <img src="{{ asset('storage/' . $project->banner) }}" alt="Banner" style="max-width: 100%;">
        </div>
    @endif

    @if ($project->images)
        <div>
            <h2>Images</h2>
            @foreach ($project->images as $image)
                <img src="{{ asset('storage/' . $image) }}" alt="Image" style="max-width: 100%;">
            @endforeach
        </div>
    @endif
</x-project-layout>
