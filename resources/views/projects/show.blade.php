<x-projects-layout>
    @if ($project->banner)
        <div class="mb-4 w-full h-100">
            <img src="{{ asset('storage/' . $project->banner) }}" alt="Banner" class="mb-4 w-full crop-top">
        </div>
    @endif

    <div class="mb-4">
        <a href="{{ url('/#projects') }}"
            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back
        </a>
    </div>

    <div class="max-w-7xl mx-auto px-4 xs:mt-50 sm:px-6 lg:px-8 py-8">
        <div class="mb-4">
            <h1 class="text-7xl mb-4">{{ $project->title }}</h1>
            <div class="mb-4">
                <h2>Year {{ $project->year }}</h2>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-x-8 gap-y-10 sm:grid-cols-6">

            <div class="space-y-4 w-full h-full sm:col-span-4">
                <p class="text-lg text-gray-600 leading-relaxed mb-4 w-full h-full break-words">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, quam. Quis eius aut totam, in sint
                    pariatur harum cupiditate nam, quos repudiandae nulla debitis recusandae quisquam omnis! Distinctio,
                    quos
                    suscipit.
                    Esse corporis a nobis odio, molestiae, omnis ipsam perferendis, pariatur voluptatibus recusandae
                    iusto.
                    Fugit, dignissimos id aut vel vero asperiores facere, quod aliquam, molestias ipsum nihil numquam
                    iste
                    perferendis magni?
                    Magni, minus dolorem. Aperiam, inventore, consequatur quibusdam non quas sequi hic quo rem corporis
                    dolores
                    molestias eveniet dolorum magni culpa itaque illum ipsam porro tenetur, numquam distinctio qui
                    nesciunt
                    dicta.
                    Placeat repudiandae non deserunt illo odit consequatur adipisci accusantium nobis voluptatibus,
                    aliquid
                    fugit expedita! Neque, facilis. Velit, cumque repudiandae labore esse corporis qui tempore quis
                    officiis
                    perferendis inventore culpa similique.
                    At, impedit asperiores soluta facere quia harum quo suscipit. Fugiat maxime hic obcaecati culpa
                    earum
                    quod
                    aspernatur temporibus est. Inventore, rem? Ipsam quo consectetur placeat repudiandae esse ut,
                    inventore
                    debitis.
                    Voluptate magnam, ipsa officia porro explicabo tempora soluta iusto eveniet iste, nulla modi
                    recusandae?
                    Et,
                    blanditiis magni distinctio quidem expedita rerum voluptas numquam quasi, quae id aliquam pariatur
                    laborum
                    illum.
                    Itaque temporibus eveniet ratione, quos harum accusamus consectetur dolores necessitatibus.
                    Explicabo
                    iure
                    nam deserunt quasi delectus maiores adipisci aperiam autem ex impedit, maxime qui possimus placeat
                    dolorem.
                    Aperiam, sed debitis.
                    Cupiditate sequi error eveniet quos minima sint hic, voluptate distinctio totam dignissimos, sed ex
                    nisi
                    a?
                    Eligendi illo nostrum maiores unde dicta, magnam explicabo adipisci, laboriosam neque aspernatur
                    dolor?
                    Incidunt?
                    Sapiente itaque quis nobis ab. Sapiente sint exercitationem iure suscipit nulla, autem libero
                    doloribus
                    tempore eaque ducimus ut, dicta ipsa cum excepturi. Eius nulla totam fuga distinctio amet enim!
                    Doloribus?
                    Ducimus dolorum quidem voluptas repellat cupiditate doloribus aspernatur voluptatem deleniti
                    veritatis
                    dolores nam vel culpa alias perspiciatis in molestiae blanditiis esse animi optio, amet nisi.
                    Tempora
                    perferendis labore saepe reiciendis!
                    {{ $project->description }}
                </p>
                <a href="{{ $project->url }}" target="_blank" type="button"
                    class="bg-blue-400 py-1 px-2 rounded-lg shadow-custom hover-knop hover-knop:hover">View
                    Project</a>
            </div>
            @if ($project->images)
                <div class="space-y-4 mt-4 w-full h-64 sm:col-span-2">
                    @foreach ($project->images as $image)
                        <img src="{{ asset('storage/' . $image) }}" class="rounded-lg" alt="Image"
                            style="max-width: 100%;">
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-projects-layout>
