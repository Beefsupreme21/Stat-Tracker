@if ($errors->any())
    <div class="border border-red-600 p-4 prose text-red-500">
        <ul class="list-disc">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
