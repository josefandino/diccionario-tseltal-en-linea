<div class="menuAbc">
    <!-- <div> -->
    @foreach ($abecedario as $item)
        <a href="{{ route('abededarioSelecionada', $item->abecede) }}"><b>{{ $item->abecede }}</b></a>
    @endforeach
    <!-- </div> -->
</div>
