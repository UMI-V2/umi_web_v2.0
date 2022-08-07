{{-- <!-- Id Field -->
<div class="col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $user->addresses->id }}</p>
</div> --}}

<div class="row">
    @foreach ($user->addresses as $address)
        <div class="col-sm-6">
            {!! Form::label('nama', 'Nama Penerima:') !!}
            <p>{{ $address->nama }}</p>
        </div>

        <!-- Id Provinsi Field -->
        <div class="col-sm-6">
            {!! Form::label('no_hp', 'Nomor HP Penerima:') !!}
            <p>{{ $address->no_hp }}</p>
        </div>

        <!-- Id Kota Field -->
        <div class="col-sm-6">
            {!! Form::label('subdistrict_name', 'Kecamatan:') !!}
            <p>{{ $address->kecamatan->subdistrict_name }}</p>
        </div>

        <!-- Id Kota Field -->
        <div class="col-sm-6">
            {!! Form::label('city_name', 'Kabupaten/Kota:') !!}
            <p>{{ $address->kota->city_name }}</p>
        </div>

        <!-- Id Kota Field -->
        <div class="col-sm-6">
            {!! Form::label('province_name', 'Provinsi:') !!}
            <p>{{ $address->provinsi->province_name }}</p>
        </div>

                <!-- Alamat Lengkap Field -->
                <div class="col-sm-6">
                    {!! Form::label('alamat_lengkap', 'Alamat Lengkap:') !!}
                    <p>{{ $address->alamat_lengkap }}</p>
                </div>
        

        <!-- Patokan Field -->
        <div class="col-sm-6">
            {!! Form::label('patokan', 'Patokan:') !!}
            <p>{{ $address->patokan }}</p>
        </div>

        <!-- Is Alamat Utama Field -->
        <div class="col-sm-6">
            {!! Form::label('is_alamat_utama', 'Apakah Alamat Utama:') !!}
            <p>{{ ($address->is_alamat_utama)?'Ya':'Tidak' }}</p>
        </div>

        <!-- Is Rumah Field -->
        <div class="col-sm-6">
            {!! Form::label('is_rumah', 'Apakah Alamat Rumah:') !!}
            <p>{{ $address->is_rumah?'Ya':'Tidak' }}</p>
        </div>

        <!-- Is Kantor Field -->
        <div class="col-sm-6">
            {!! Form::label('is_kantor', 'Apakah Alamat Kantor:') !!}
            <p>{{ $address->is_kantor?'Ya':'Tidak' }}</p>
        </div>

        <!-- Is Usaha Field -->
        <div class="col-sm-6">
            {!! Form::label('is_usaha', 'Apakah Alamat Lapak:') !!}
            <p>{{ $address->is_usaha?'Ya':'Tidak' }}</p>
        </div>

        <!-- Latitude Field -->
        <div class="col-sm-6">
            {!! Form::label('latitude', 'Latitude:') !!}
            <p>{{ $address->latitude }}</p>
        </div>

        <!-- Longitude Field -->
        <div class="col-sm-6">
            {!! Form::label('longitude', 'Longitude:') !!}
            <p>{{ $address->longitude }}</p>
        </div>

        <!-- Created At Field -->
        <div class="col-sm-6">
            {!! Form::label('created_at', 'Created At:') !!}
            <p>{{ $address->created_at }}</p>
        </div>

        <!-- Updated At Field -->
        <div class="col-sm-6">
            {!! Form::label('updated_at', 'Updated At:') !!}
            <p>{{ $address->updated_at }}</p>
        </div>

        <hr style="height:2px; width:100%; border-width:0; color:red; background-color:red">
        @endforeach
    </div>
