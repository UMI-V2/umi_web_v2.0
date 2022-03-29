<!-- Id Usaha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_usaha', 'Id Usaha:') !!}
    {!! Form::select('id_usaha', $businesses, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Id Master Kategori Usaha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_master_kategori_usaha', 'Id Master Kategori Usaha:') !!}
    {!! Form::select('id_master_kategori_usaha', $master_business_categories, null, ['class' => 'form-control custom-select']) !!}
</div>
