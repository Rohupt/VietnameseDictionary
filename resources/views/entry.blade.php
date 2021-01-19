@extends('layouts.pages')

@section('left-col')
    @foreach ($entries as $entry)
    <div class="card mx-3 mr-lg-0 my-3" id="{{ $entry->id }}">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-10"> <h3 class="card-title my-auto">{{ $entry->entry }}<small class="card-subtitle font-italic font-weight-light text-muted font-smaller ml-3">{{ $entry->lexclassname ? $entry->lexclassname->name1 : "" }}</small></h3></div>
                <div class="col-sm align-self-center text-right">
                    @guest
                    @else
                    <div class="{{ $entry->userAdded ? 'fas' : 'far' }} fa-star fa-lg" role="button" title="Lưu / bỏ lưu từ" onmouseover="toggleEntryHover()" onmouseout="toggleEntryHover()" onclick="save_entry({{ $entry->id }})"></div>
                    @endguest
                </div>
            </div>
        </div>
        
        <div class="card-body">
            @foreach ($entry->sections as $section)
            <div class="row justify-content-end">
                @if (count($entry->sections) > 1)
                <div class="col-2">
                    @if ($entry->lexclass != null && $section->lexclass != null) $sectLexClass = '(hoặc {{$section->lexclass}}.)' @endif
                    <h5 class="">{{ Helper::toRoman($section->position) }}<span class="font-italic font-weight-light text-muted font-smaller">{{' '.$sectLexClass}}</span></h5>
                </div>
                @endif
                @foreach ($section->meanings as $meaning)
                <div class="col-10">
                    <p>
                        @if (count($section->meanings) > 1)
                            <span class="font-weight-bold">{{$meaning->position.' '}}
                                @if (($entry->lexclass != null || $section->lexclass != null) && $meaning->lexclass != null)
                                    <span class='font-italic'>'(hoặc {{$meaning->lexclass}}.) '</span>
                                @endif
                            </span>
                            {{ $meaning->content }}
                            @if ($meaning->example1 != null) <br><span class="font-italic text-muted">{{ $meaning->example1 }}</span> @endif
                            @if ($meaning->example2 != null) <br><span class="font-italic text-muted">{{ $meaning->example2 }}</span> @endif
                            @if ($meaning->example3 != null) <br><span class="font-italic text-muted">{{ $meaning->example3 }}</span> @endif
                            @if ($meaning->example4 != null) <br><span class="font-italic text-muted">{{ $meaning->example4 }}</span> @endif
                            @if ($meaning->example5 != null) <br><span class="font-italic text-muted">{{ $meaning->example5 }}</span> @endif
                        @endif
                    </p>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
        <div class="card-body">
            <p>
                <span class="font-weight-bold">(Từ nguyên) </span>
                {{ $entry->etym_comment != null ? $entry->etym_comment : 'Chưa rõ, hoặc chưa cập nhật.'}}
            </p>
        </div>
        @if ($entry->usage_comment != null)
        <div class="card-body">
                {!! nl2br($entry->usage_comment, false) !!}
            </p>
        </div>
        @endif
    </div>
    @endforeach
@endsection

@section('scripts')
@parent
<script type="text/javascript">
    function save_entry(id) {
        $target = $(event.target);
        $.ajax({
            url: "{{ route('user.toggleEntry') }}",
            method: 'POST',
            data: { "_token": "{{ csrf_token() }}", "entryId": id },
            success: () => {
                $target.toggleClass("fas").toggleClass("far");
            },
            error: (xhr, status, response) => {
                console.log(xhr);
                console.log(status);
                console.log(response);
            }
        });
    }

    function toggleEntryHover() {
        $(event.target).toggleClass("fas").toggleClass("far");
    }
</script>
@endsection

@section('right-col')
<div class="card my-3 mx-3 ml-lg-0 sticky-top" id="entry-list">
    <div class="card-body">
        @foreach ($entries as $entry)
            <a href="#{{$entry->id}}" class="font-weight-bold">{{$entry->entry.' '}}<span class="font-weight-light font-italic">{{ $entry->lexclassname ? $entry->lexclassname->name1 : "" }}</span></a>
            <br>
        @endforeach
    </div>
</div>
@endsection

@section('scripts')
@parent
<script>
    $(function () {
        var rem = parseInt($('html').css('font-size'));
        $('#entry-list').css({"top": $('#searchbar').height() + rem * 2});
        console.log($('#entry-list').css("top"));
    })
</script>
@endsection