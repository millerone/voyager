
<input type="hidden" data-wine-id="{{$dataTypeContent->id}}" id="wine-ghost-id"/>
<div id="pdf-link-admin">
@if($row->field == 'pdf')
    @if( $dataTypeContent->getPdfPath() != null )
            
            @foreach(json_decode($dataTypeContent->getPdfPath()) as $file)
            {{--  {{dd($dataTypeContent->id)}}  --}}
                <br/><a class="fileType" id="pdf_i18n_link" data-wine-id="{{$dataTypeContent->id}}" target="_blank" href="{{ Storage::disk(config('voyager.storage.disk'))->url($file->download_link) ?: '' }}"> {{ $file->original_name ?: '' }} </a>
                <a class="icon voyager-trash deletePdf" href="javascript:void(0)"></a>
            @endforeach
        
    @endif
    @else
    @if(isset($dataTypeContent->{$row->field}))
        @if(json_decode($dataTypeContent->{$row->field}))
            @foreach(json_decode($dataTypeContent->{$row->field}) as $file)
                <br/><a class="fileType" target="_blank" href="{{ Storage::disk(config('voyager.storage.disk'))->url($file->download_link) ?: '' }}"> {{ $file->original_name ?: '' }} </a>
            @endforeach
        @else
            <a class="fileType" target="_blank" href="{{ Storage::disk(config('voyager.storage.disk'))->url($dataTypeContent->{$row->field}) }}"> Download </a>
        @endif
    @endif

    

@endif
</div>
@if($row->field == 'pdf')
<input type="hidden"  name="pdf_original" value="{{$dataTypeContent->pdf}}"/>
@endif

<input @if($row->required == 1 && !isset($dataTypeContent->{$row->field})) required @endif type="file"  data-name="{{ $row->display_name }}"  name="{{ $row->field }}[]" multiple="multiple">
