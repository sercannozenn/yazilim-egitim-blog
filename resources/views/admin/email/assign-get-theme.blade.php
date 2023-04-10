@if($themes->count())
    <select name="theme_type_id" id="theme-type" class="form-control">
        @foreach($themes as $theme)
            <option value="{{ $theme->id }}">{{ $theme->name }}</option>
        @endforeach
    </select>
@else
    <div class="alert alert-warning py-0" style="line-height: 45px; height: 45px;">
        Tema Bulunamadı
    </div>
@endif

